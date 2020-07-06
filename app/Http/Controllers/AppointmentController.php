<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\User;
use App\Counselor;
use App\Mahasiswa;
use Auth;
use DB;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $user = Auth::user();
        $counselor = Counselor::with('data_user')->get();
        // $user = User::with('user_role')->find(Auth::id());
        $user = DB::table('users')
            ->join('v_mhs', 'users.email', '=', 'v_mhs.nim')
            ->join('v_karyawan', 'v_mhs.dosen_wl', '=', 'v_karyawan.nik')
            ->get()->first();
        // dd($user);
        return view('backend.mhs.buatappointment', compact('user','counselor'));
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
        // dd($request->all());
        $user = Auth::user();
        $appointment = Appointment::create([
            'user_id' => $user->id,
            'counselor_id' => $request->counselor,
            'tgl_appointment' => $request->tgl_appointment,
            'description' => $request->description,
            // 'created_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->action('AppointmentController@index')->with('status', 'Data appointment berhasil ditambahkan');
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
