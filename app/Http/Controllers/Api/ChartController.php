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
    public function chart_problem(Request $request)
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
        ->whereRaw('YEAR(created_at) = ?', [$tahun])
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
            ['label' => 'Masalah Pribadi', 'data' => $masalah_pribadi, 'backgroundColor' => '#f56954'],
            ['label' => 'Masalah Sosial', 'data' => $masalah_sosial, 'backgroundColor' => '#00a65a'],
            ['label' => 'Masalah Karir', 'data' => $masalah_karir, 'backgroundColor' => '#f39c12'],
            ['label' => 'Masalah Keluarga', 'data' => $masalah_keluarga, 'backgroundColor' => '#00c0ef'],
            ['label' => 'Lain-lain', 'data' => $masalah_lain, 'backgroundColor' => '#3c8dbc'],
        ]);
        $masalah_chart = [
            'labels' => $bulan_masalah, 
            'dataset' => $data_masalah
        ];
        return response()->json($masalah_chart);
    }

    public function chart_prodi(Request $request)
    {
        $tahun = date('Y');
        if($request->filter_tahun){
            $tahun = $request->filter_tahun;
        }
        
        $prodi = Major::all();
        $bln_appointment = Appointment::selectRaw('MONTH(tgl_appointment) AS bulan')->whereRaw('YEAR(tgl_appointment) = ?', [$tahun])->groupBy(DB::raw('MONTH(tgl_appointment)'))->get()->pluck('bulan');
        $warna = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#ec5858', '#34626c', '#5c6e91'];
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
        return response()->json($prodi_chart);
    }

    public function chart_tingkat(Request $request)
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
            ['label' => 'Rendah', 'data' => $jml_rendah, 'backgroundColor' => '#f56954'],
            ['label' => 'Sedang', 'data' => $jml_sedang, 'backgroundColor' => '#00a65a'],
            ['label' => 'Berat', 'data' => $jml_berat, 'backgroundColor' => '#f39c12'],
        ]);
        $tingkat_chart = [
            'labels' => $bulan_tingkat,
            'dataset' => $data_tingkat
        ];

        return response()->json($tingkat_chart);
    }

    public function chart_online(Request $request)
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
        return response()->json($online_chart);
    }

    public function chart_warek(Request $request)
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
        $data = [
            'data_masalah' => $masalah_chart,
            'data_prodi' => $prodi_chart,
            'data_tingkat' => $tingkat_chart,
            'data_online' => $online_chart,
        ];
        return response()->json($data);
    }
}