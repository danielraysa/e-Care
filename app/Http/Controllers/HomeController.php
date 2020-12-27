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
use App\Http\Controllers\Api\ChartController;

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

    public function chart_konselor(Request $request)
    {
        $data = new ChartController;
        $kasus_chart = $data->chart_kasus($request);
        $prodi_chart = $data->chart_prodi($request);
        $tingkat_chart = $data->chart_jenis_tingkat($request);
        $online_chart = $data->chart_online_offline($request);

        $data = [
            'data_kasus' => $kasus_chart,
            'data_prodi' => $prodi_chart,
            'data_tingkat' => $tingkat_chart,
            'data_online' => $online_chart,
        ];
        return response()->json($data);
    }

    public function chart_warek(Request $request)
    {
        $data = new ChartController;
        $kasus_chart = $data->chart_kasus($request);
        $masalah_chart = $data->chart_jenis_masalah($request);
        $prodi_chart = $data->chart_prodi($request);
        $tingkat_chart = $data->chart_jenis_tingkat($request);
        $online_chart = $data->chart_online_offline($request);

        $data = [
            'data_kasus' => $kasus_chart,
            'data_masalah' => $masalah_chart,
            'data_prodi' => $prodi_chart,
            'data_tingkat' => $tingkat_chart,
            'data_online' => $online_chart,
        ];
        return response()->json($data);
    }
    public function test_data(Request $request)
    {
        $data = new ChartController;
        $kasus_chart = $data->chart_kasus($request);
        $masalah_chart = $data->chart_jenis_masalah($request);
        $prodi_chart = $data->chart_prodi($request);
        $tingkat_chart = $data->chart_jenis_tingkat($request);
        $online_chart = $data->chart_online_offline($request);

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
