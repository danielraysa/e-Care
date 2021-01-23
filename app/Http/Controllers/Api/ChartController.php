<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Appointment;
use App\RekamMedis;
use App\TestMbti;
use App\TestScore;
use App\Major;
use App\Helper\Helper;
use DB;

class ChartController extends Controller
{
    public function chart_kasus(Request $request)
    {
        $tahun = date('Y');
        if($request->filter_tahun){
            $tahun = $request->filter_tahun;
        }
        $data_chart = Appointment::selectRaw("MONTH(tgl_appointment) bulan, COUNT(*) AS jumlah")
        ->whereRaw('YEAR(tgl_appointment) = ?', [$tahun])
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

        $bulan_kasus = array();
        $jml_kasus = array();
        foreach($data_chart as $chart){
            array_push($bulan_kasus, Helper::bulan_indo($chart->bulan));
            array_push($jml_kasus, $chart->jumlah);
        }
        $data_kasus = collect([
            ['label' => 'Jumlah', 'data' => $jml_kasus, 'backgroundColor' => '#f9ed69', ],
        ]);
        $kasus_chart = [
            'labels' => $bulan_kasus, 
            'dataset' => $data_kasus
        ];
        return $kasus_chart;
    }

    public function chart_jenis_masalah(Request $request)
    {
        $tahun = date('Y');
        if($request->filter_tahun){
            $tahun = $request->filter_tahun;
        }
        $data_chart = Appointment::selectRaw("MONTH(tgl_appointment) bulan, 
		SUM(CASE WHEN jenis_problem = 'Masalah Pribadi' THEN 1 ELSE 0 END) pribadi,
        SUM(CASE WHEN jenis_problem = 'Masalah Sosial' THEN 1 ELSE 0 END) sosial,
        SUM(CASE WHEN jenis_problem = 'Masalah Karir' THEN 1 ELSE 0 END) karir,
        SUM(CASE WHEN jenis_problem = 'Masalah Keluarga' THEN 1 ELSE 0 END) keluarga,
        SUM(CASE WHEN jenis_problem = 'Lain-lain' THEN 1 ELSE 0 END) lain")
        ->whereRaw('YEAR(tgl_appointment) = ?', [$tahun])
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

        $bulan_masalah = array();
        $masalah_pribadi = array();
        $masalah_sosial = array();
        $masalah_karir = array();
        $masalah_keluarga = array();
        $masalah_lain = array();
        foreach($data_chart as $chart){
            array_push($bulan_masalah, Helper::bulan_indo($chart->bulan));
            array_push($masalah_pribadi, $chart->pribadi);
            array_push($masalah_sosial, $chart->sosial);
            array_push($masalah_karir, $chart->karir);
            array_push($masalah_keluarga, $chart->keluarga);
            array_push($masalah_lain, $chart->lain);
        }
        $data_masalah = collect([
            ['label' => 'Masalah Pribadi', 'data' => $masalah_pribadi, 'backgroundColor' => '#9ad3bc'],
            ['label' => 'Masalah Sosial', 'data' => $masalah_sosial, 'backgroundColor' => '#53354a'],
            ['label' => 'Masalah Karir', 'data' => $masalah_karir, 'backgroundColor' => '#2b2e4a'],
            ['label' => 'Masalah Keluarga', 'data' => $masalah_keluarga, 'backgroundColor' => '#903749'],
            ['label' => 'Lain-lain', 'data' => $masalah_lain, 'backgroundColor' => '#f3eac2'],
        ]);
        $masalah_chart = [
            'labels' => $bulan_masalah, 
            'dataset' => $data_masalah
        ];
        return $masalah_chart;
    }

    public function chart_prodi(Request $request)
    {
        $tahun = date('Y');
        if($request->filter_tahun){
            $tahun = $request->filter_tahun;
        }
        
        $prodi = Major::all();
        $warna = ['#d72323', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#ec5858', '#34626c', '#5c6e91'];
        if($request->pie){
            $dt_chart = DB::select("SELECT p.kode_prodi prodi, p.major_name nama_prodi, COUNT(*) AS jumlah FROM appointments a JOIN users u ON a.user_id = u.id JOIN majors p ON SUBSTR(u.email, 3, 5) = p.kode_prodi WHERE p.deleted_at IS NULL AND YEAR(tgl_appointment) = '$tahun' GROUP BY p.kode_prodi");
            $new_prodi = array();
            $data_prodi = array();
            foreach($dt_chart as $chart){
                array_push($new_prodi, $chart->nama_prodi);
                array_push($data_prodi, $chart->jumlah);
            }
            $prodi_chart = ['label' => $new_prodi, 'data' => $data_prodi, 'backgroundColor' => $warna,];
            return $prodi_chart;
        }
        $bln_appointment = Appointment::selectRaw('MONTH(tgl_appointment) AS bulan')->whereRaw('YEAR(tgl_appointment) = ?', [$tahun])->groupBy(DB::raw('MONTH(tgl_appointment)'))->get()->pluck('bulan');
        $prodi_datachart = $prodi->map(function($item, $key) use ($bln_appointment, $tahun, $warna){
            $temp_arr = array();
            foreach($bln_appointment as $bln){
                $dt_chart = DB::select("SELECT COUNT(*) AS jumlah FROM appointments a JOIN users u ON a.user_id = u.id JOIN majors p ON SUBSTR(u.email, 3, 5) = p.kode_prodi WHERE p.kode_prodi = '$item->kode_prodi' AND YEAR(tgl_appointment) = '$tahun' AND MONTH(tgl_appointment) = '$bln'")[0];
                array_push($temp_arr, $dt_chart->jumlah);
            }
            $sets = [
                'label' => $item->major_name,
                'data' => $temp_arr,
                'backgroundColor' => $warna[$key]
            ];
            return $sets;
        });
        $label_bulan = $bln_appointment->map(function($item){
            return Helper::bulan_indo($item);
        });
        $prodi_chart = [
            'labels' => $label_bulan,
            'dataset' => $prodi_datachart
        ];
        return $prodi_chart;
    }

    public function chart_jenis_tingkat(Request $request)
    {
        $tahun = date('Y');
        if($request->filter_tahun){
            $tahun = $request->filter_tahun;
        }

        $rekam_tingkat = RekamMedis::selectRaw("MONTH(tgl) bln, 
		SUM(CASE WHEN hasil_tingkat = 'rendah' THEN 1 ELSE 0 END) rendah,
        SUM(CASE WHEN hasil_tingkat = 'sedang' THEN 1 ELSE 0 END) sedang,
        SUM(CASE WHEN hasil_tingkat = 'berat' THEN 1 ELSE 0 END) berat")
        ->whereRaw("YEAR(tgl) = '$tahun'")
        ->groupBy('bln')->get();
        $bulan_tingkat = array();
        $jml_rendah = array();
        $jml_sedang = array();
        $jml_berat = array();
        foreach($rekam_tingkat as $rekam){
            array_push($bulan_tingkat, Helper::bulan_indo($rekam->bln));
            array_push($jml_rendah, $rekam->rendah);
            array_push($jml_sedang, $rekam->sedang);
            array_push($jml_berat, $rekam->berat);
        }
        $data_tingkat = collect([
            ['label' => 'Rendah', 'data' => $jml_rendah, 'backgroundColor' => 'rgba(0, 0, 0, 0)', 'borderColor' => '#ffa62b'],
            ['label' => 'Sedang', 'data' => $jml_sedang, 'backgroundColor' => 'rgba(0, 0, 0, 0)', 'borderColor' => '#db6400'],
            ['label' => 'Berat', 'data' => $jml_berat, 'backgroundColor' => 'rgba(0, 0, 0, 0)', 'borderColor' => '#bb2205'],
        ]);
        $tingkat_chart = [
            'labels' => $bulan_tingkat,
            'dataset' => $data_tingkat
        ];

        return $tingkat_chart;
    }

    public function chart_online_offline(Request $request)
    {
        $tahun = date('Y');
        if($request->filter_tahun){
            $tahun = $request->filter_tahun;
        }
        $bulan = array();
        for($m = 1; $m <= 12; $m++){
            array_push($bulan, Helper::bulan_indo($m));
        }
        $jml_online = collect($bulan)->map(function($item, $key) use($tahun) {
            $get_data = Appointment::selectRaw('COUNT(*) AS jumlah')->whereRaw('YEAR(tgl_appointment) = ?',[$tahun])->whereRaw('MONTH(tgl_appointment) = ?', [$key+1])->get()->first();
            return $get_data->jumlah;
        });
        $jml_offline = collect($bulan)->map(function($item, $key) use($tahun) {
            $get_data = DB::table('db_konseling.konseli')->selectRaw('COUNT(*) AS jumlah')->whereRaw('YEAR(tgl_registrasi) = ?',[$tahun])->whereRaw('MONTH(tgl_registrasi) = ?', [$key+1])->get()->first();
            return $get_data->jumlah;
        });
        $online_chart = [
            'labels' => $bulan,
            'dataset' => [
                [
                    'label' => 'Online',
                    'data' => $jml_online,
                    'backgroundColor' => '#f56954'
                ],
                [
                    'label' => 'Offline',
                    'data' => $jml_offline,
                    'backgroundColor' => '#00a65a'
                ],
            ]
        ];
        return $online_chart;
    }

}
