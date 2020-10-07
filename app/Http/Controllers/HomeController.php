<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Appointment;
use App\RekamMedis;

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
    public function index()
    {
        $permintaan = Appointment::where('status', 'M')->get();
        $konseling = Appointment::where('status', 'S')->get();
        $rekam = RekamMedis::all();
        $user = Auth::user();
        if($user->role_id == 1){
            return view('backend.konselor.dashboard', compact('permintaan', 'konseling', 'rekam'));
        }else{
            return view('backend.konselor.dashboard', compact('permintaan', 'konseling', 'rekam'));
        }
    } 
}
