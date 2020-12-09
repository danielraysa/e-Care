<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Appointment;
use App\Major;
use App\RekamMedis;
use App\Helper\Helper;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $prodi = Major::all();
        // $prodi = Major::whereNull('deleted_at')->get();
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
        $data_chart = DB::select("SELECT p.kode_prodi prodi, p.major_name nama_prodi, COUNT(*) AS jumlah FROM appointments a JOIN users u ON a.user_id = u.id JOIN majors p ON SUBSTR(u.email, 3, 5) = p.kode_prodi WHERE p.deleted_at IS NULL AND a.status NOT IN ('T', 'M') GROUP BY p.kode_prodi");
        $new_prodi = array();
        $data_prodi = array();
        foreach($data_chart as $chart){
            array_push($new_prodi, $chart->nama_prodi);
            array_push($data_prodi, $chart->jumlah);
        }
        return response()->json(compact('new_prodi','data_prodi'), 200);
        // dd($new_prodi, $data_prodi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
