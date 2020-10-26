<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Appointment;
use App\RekamMedis;
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
        $this->middleware('auth');
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
        $rekam = RekamMedis::all();
        $user = Auth::user();
        $tahun = date('Y');
        if($request->filter_tahun){
            $tahun = $request->filter_tahun;
        }
        /* $data_chart = Appointment::selectRaw('YEAR(created_at) tahun, MONTH(created_at) bulan, COUNT(*) jumlah_data')
        ->groupBy('tahun', 'bulan')
        ->orderBy('tahun', 'desc')
        ->get()->toJson(); */
        $data_chart = Appointment::selectRaw('MONTH(created_at) bulan, COUNT(*) jumlah_data')
        ->whereRaw('YEAR(created_at) = ?', [$tahun])
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get()->toJson();
        // dd($data_chart);
        if($user->role_id == 2){
            return view('backend.mhs.dashboard', compact('permintaan', 'konseling', 'rekam'));
        }else{
            return view('backend.konselor.dashboard', compact('permintaan', 'konseling', 'rekam', 'data_chart'));
        }
    }

    public function chart_data(Request $request)
    {
        $tahun = date('Y');
        if($request->filter_tahun){
            $tahun = $request->filter_tahun;
        }
        $chart_bulan = Appointment::selectRaw('MONTH(created_at) bulan, COUNT(*) jumlah_data')
        ->whereRaw('YEAR(created_at) = ?', [$tahun])
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();
        // $chart_prodi = DB::table('majors')
        // ->join('users', 'majors.kode_prodi', '=', 'concat(users.email,3,5)')
        // ->join('appointments', 'users.id', '=', 'appointments.user_id')
        // ->selectRaw("majors.major_name prodi, count(appointments.id) jumlah")
        // ->get();
        $chart_prodi = DB::select("SELECT m.major_name prodi, count(a.id) jumlah FROM majors m JOIN users u ON m.kode_prodi = substr(u.email, 3, 5) JOIN appointments a ON u.id = a.user_id GROUP BY m.major_name");
        // dd($chart_prodi);
        // $chart_prodi = DB::select(DB::raw("SELECT m.major_name prodi, count(a.id) jumlah FROM majors m JOIN users u ON m.kode_prodi = substr(u.email, 3, 5) JOIN appointments a ON u.id = a.user_id group by m.kode_prodi"));
        for($i = 0; $i < $chart_bulan->count(); $i++){
            $chart_bulan[$i]->bulan = Helper::bulan_indo($chart_bulan[$i]->bulan);
        }
        // dd($data_chart);
        return response()->json(compact('chart_bulan','chart_prodi'), 200);
    }
}
