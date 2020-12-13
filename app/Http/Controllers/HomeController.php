<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Appointment;
use App\RekamMedis;
use App\TestMbti;
use App\TestScore;
use App\Major;
use App\Helper\Helper;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permintaan = Appointment::where('status', 'M')->get();
        $konseling = Appointment::where('status', 'S')->get();
        $tingkat_berat = TestScore::where('skor', '>', 12)->get();
        $rekam = RekamMedis::all();
        $user = Auth::user();
        $tahun = date('Y');
        if($request->filter_tahun){
            $tahun = $request->filter_tahun;
        }
        $tahun_appointment = Appointment::selectRaw('YEAR(tgl_appointment) AS tahun')->groupBy('tahun')->orderBy('tahun')->get();
        // chart untuk konselor
        $data_chart = Appointment::selectRaw('MONTH(tgl_appointment) bulan, COUNT(*) jumlah_data')
        ->whereRaw('YEAR(tgl_appointment) = ?', [$tahun])
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();
        // dd($data_chart);
        $test1 = array();
        $test2 = array();
        foreach($data_chart as $chart){
            $chart->bulan = Helper::bulan_indo($chart->bulan);
            array_push($test1, $chart->bulan);
            array_push($test2, $chart->jumlah_data);
        }
        $kons_chart = array('label' => $test1, 'data' => $test2);

        $dt_chart = DB::select("SELECT p.kode_prodi prodi, p.major_name nama_prodi, COUNT(*) AS jumlah FROM appointments a JOIN users u ON a.user_id = u.id JOIN majors p ON SUBSTR(u.email, 3, 5) = p.kode_prodi WHERE p.deleted_at IS NULL AND YEAR(tgl_appointment) = '$tahun' GROUP BY p.kode_prodi");
        $new_prodi = array();
        $data_prodi = array();
        foreach($dt_chart as $chart){
            array_push($new_prodi, $chart->nama_prodi);
            array_push($data_prodi, $chart->jumlah);
        }
        // select MONTHNAME(tgl) bln, (SELECT count(*) from rekam_medis rm where hasil_tingkat = 'rendah' and MONTHNAME(tgl) = bln) as rendah, (SELECT count(*) from rekam_medis rm where hasil_tingkat = 'sedang' and MONTHNAME(tgl) = bln) as sedang,(SELECT count(*) from rekam_medis rm where hasil_tingkat = 'berat' and MONTHNAME(tgl) = bln) as berat from rekam_medis rm2 group by MONTHNAME(tgl); 
        $prodi_chart = array('label' => $new_prodi, 'data' => $data_prodi);
        
        if($user->role_id == 2){ // mahasiswa
            return view('backend.mhs.dashboard');
        }else if($user->role_id == 3){ // wakil rektor
            return view('backend.warek.dashboard', compact('permintaan', 'konseling', 'rekam', 'tahun_appointment', 'tingkat_berat'));
        }else{
            return view('backend.konselor.dashboard', compact('permintaan', 'konseling', 'rekam', 'tahun_appointment', 'kons_chart','prodi_chart'));
        }
    }

    public function chart_data(Request $request)
    {
        $tahun = date('Y');
        if($request->filter_tahun){
            $tahun = $request->filter_tahun;
        }
        $chart_bulan = Appointment::selectRaw('MONTH(tgl_appointment) bulan, COUNT(*) jumlah_data')
        ->whereRaw('YEAR(tgl_appointment) = ?', [$tahun])
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();
        
        $chart_prodi = DB::select("SELECT m.major_name prodi, count(a.id) jumlah FROM majors m JOIN users u ON m.kode_prodi = substr(u.email, 3, 5) JOIN appointments a ON u.id = a.user_id GROUP BY m.major_name");
        
        for($i = 0; $i < $chart_bulan->count(); $i++){
            $chart_bulan[$i]->bulan = Helper::bulan_indo($chart_bulan[$i]->bulan);
        }

        $dt_chart = DB::select("SELECT p.kode_prodi prodi, p.major_name nama_prodi, COUNT(*) AS jumlah FROM appointments a JOIN users u ON a.user_id = u.id JOIN majors p ON SUBSTR(u.email, 3, 5) = p.kode_prodi WHERE p.deleted_at IS NULL AND YEAR(tgl_appointment) = '$tahun' GROUP BY p.kode_prodi");
        $new_prodi = array();
        $data_prodi = array();
        foreach($dt_chart as $chart){
            array_push($new_prodi, $chart->nama_prodi);
            array_push($data_prodi, $chart->jumlah);
        }
        
        $prodi_chart = array('label' => $new_prodi, 'data' => $data_prodi);
        // dd($data_chart);
        return response()->json(compact('chart_bulan','chart_prodi'), 200);
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
            ['label' => 'Jumlah', 'fill' => false, 'data' => $jml_kasus, 'backgroundColor' => '#fbc3ba', 'borderColor' => '#f56954', ],
        ]);
        $kasus_chart = [
            'labels' => $bulan_kasus, 
            'dataset' => $data_kasus
        ];
        
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
            'data_kasus' => $kasus_chart,
            'data_masalah' => $masalah_chart,
            'data_prodi' => $prodi_chart,
            'data_tingkat' => $tingkat_chart,
            'data_online' => $online_chart,
        ];
        return response()->json($data);
    }
}
