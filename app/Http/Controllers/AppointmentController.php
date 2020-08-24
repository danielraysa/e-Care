<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\User;
use App\Counselor;
use App\Mahasiswa;
use App\Notification;
use App\Events\SendNotification;
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
        $user = User::with('user_role.data_mhs.dosen_wali')->find(Auth::id());
        /* $user = DB::table('users')
            ->join('v_mhs', 'users.email', '=', 'v_mhs.nim')
            ->join('v_karyawan', 'v_mhs.dosen_wl', '=', 'v_karyawan.nik')
            ->get()->first(); */
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
            'jenis_problem' => $request->jenis_masalah,
            'description' => $request->description,
            'status' => 'M',
            // 'created_at' => date('Y-m-d H:i:s')
        ]);
        $notif = Notification::create([
            'user_id' => $request->counselor,
            'message' => 'Ada permintaan appointment baru',
        ]);
        $event = broadcast(new SendNotification($notif));
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
        if($request->pilihan == 'Y')
        $pilihan = 'Y';
        else
        $pilihan = 'T';
        $appointment = Appointment::find($id)->create([
            'status' => $pilihan,
        ]);
        return 1;
        // return redirect()->action('AppointmentController@index')->with('status', 'Data appointment berhasil diupdate');
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

    public function kirimemail()
    {
        //
        $to = "daniel@dinamika.ac.id";
        $subject = "My subject";
        $txt = '<div style="margin: auto; max-width: 500px; background-color: #f5f5f5; padding: 2rem; border-radius: 0.5rem;">
        <img style="display: flex; margin: auto;" src="https://gate.dinamika.ac.id/staff/images/icon/logo-blue.png" alt="UNIVERSITAS DINAMIKA" /> <br>
        <p>Pengajuan sidang tugas akhir Anda <b>telah diterima</b> oleh PPTA. Detail tugas akhir Anda sebagai berikut :</p>
        <span>NIM :$znim </span> <br>
        <span>Nama : namamhse </span> <br>
        <span>Judul : judul </span> <br>
        <span>Pembimbing 1 : dobing1 </span> <br>
        <span>Pembimbing 2 : dobing2 </span> <br>
        <span>Penguji : douji </span> <br>
        <br>
        <p style="color: #949494">* Email ini dikirim otomatis oleh program. No reply.</p>
        </div>';
        $headers = "From: anel.raysa@gmail.com";

        mail($to,$subject,$txt,$headers);
    }

    public function index_konselor()
    {
        $counselor = Counselor::with('data_user')->get();
        $appointment = Appointment::with('mahasiswa.user_role.data_mhs')->where('counselor_id', Auth::id())->get();
        $user = User::with('user_role.data_mhs.dosen_wali')->find(Auth::id());
        /* $user = DB::table('users')
            ->join('v_mhs', 'users.email', '=', 'v_mhs.nim')
            ->join('v_karyawan', 'v_mhs.dosen_wl', '=', 'v_karyawan.nik')
            ->get()->first(); */
        // dd($appointment);
        return view('backend.konselor.jadwalkonselor', compact('appointment'));
    }

}
