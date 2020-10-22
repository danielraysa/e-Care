<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Appointment;
use App\RekamMedis;
use App\Helper\Helper;

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
        $data_chart = Appointment::selectRaw('MONTH(created_at) bulan, COUNT(*) jumlah_data')
        ->whereRaw('YEAR(created_at) = ?', [$tahun])
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();
        for($i = 0; $i < $data_chart->count(); $i++){
            $data_chart[$i]->bulan = Helper::bulan_indo($data_chart[$i]->bulan);
        }
        // dd($data_chart);
        return response()->json($data_chart, 200);
    }
}
