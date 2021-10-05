<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\User;
use App\Counselor;
use App\Mahasiswa;
use App\Karyawan;
use App\Notification;
use App\Events\SendNotification;
use App\Mail\NotifEmail;
use Auth;
use DB;
use Mail;

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
        $user = Auth::user();
        if($user->role_id != 2){
            return redirect()->route('home');
        }
        $nim = $user->email;
        $data['counselor'] = Counselor::with('data_user')->get();
        $data['data_appointment'] = Appointment::where('status', 'M')->with('mahasiswa.user_role.data_mhs')->orderBy('created_at','desc')->get();
        $appointment = Appointment::where('user_id', $user->id)->get()->last();
        if($appointment && $appointment->status == 'Y'){
            return redirect()->route('chat');
        }
        // $user = User::with('user_role.data_mhs.dosen_wali')->find(Auth::id());
        $data['mhs'] = Mahasiswa::find($nim);
        if($appointment){
            $data['appointment'] = $appointment;
        }
        return view('backend.mhs.buatappointment', $data);
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
        // waktu mengajukan permintaan
        // dd($request->all());
        $user = Auth::user();
        $mhs = Mahasiswa::find($user->email);
        // $dosen = Karyawan::with('data_email')->find($mhs->dosen_wali->nik);
        $dosen = Karyawan::with('data_email')->find($mhs->dosen_wl);
        $konselor = User::where('role_id', 4)->first();
        $data_konselor = Karyawan::with('data_email')->find($konselor->email);
        // dd($dosen, $data_konselor);
        $appointment = Appointment::create([
            'user_id' => $user->id,
            'counselor_id' => $konselor->id,
            // 'counselor_id' => 14, // konselor
            'tgl_appointment' => $request->tgl_appointment,
            'jenis_problem' => $request->jenis_masalah,
            'jenis_layanan' => $request->jenis_layanan,
            'description' => $request->description,
            'status' => 'M',
            // 'created_at' => date('Y-m-d H:i:s')
        ]);
        // buat notif
        $notif = Notification::create([
            'user_id' => $konselor->id,
            // 'user_id' => 14,
            'message' => 'Ada permintaan/appointment baru dari '.$user->name,
        ]);
        
        $nama = Auth::user()->name;
        
        $event = broadcast(new SendNotification($notif));
        
        $notif_appointment = true;
        // $email_konselor = 'fitriyah@dinamika.ac.id';
        $email_konselor = $data_konselor->data_email->email;
        try {
            //code...
            Mail::send('isi-email', compact('nama', 'appointment', 'notif_appointment'), function ($message) use($email_konselor)
            {
                $message->subject('Notifikasi E-Care');
                $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
                $message->to($email_konselor);
            });
        } catch (Exception $th) {
            //throw $th;
        }
        // email ke dosen wali
        $notif_dosen = true;
        $email_dosen = $dosen->data_email->email;
        // $email_dosen = 'daniel@dinamika.ac.id';
        $jenis_masalah = $request->jenis_masalah;
        try {
            //code...
            Mail::send('isi-email', compact('nama', 'appointment', 'notif_dosen', 'jenis_masalah'), function ($message) use ($email_dosen)
            {
                $message->subject('Notifikasi Mahasiswa Konseling');
                $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
                $message->to($email_dosen);
            });
        } catch (Exception $th) {
            //throw $th;
        }
        if($request->jenis_layanan == 'chatting')
        return redirect(route('chat'));
        else
        return redirect()->action('AppointmentController@index')->with('status', 'Data Appointment Berhasil Dibuat, tunggu notifikasi via email');
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
        $appointment = Appointment::find($id);
        return response()->json($appointment, 200);
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
        // waktu approve/tolak permintaan
        if($request->pilihan == 'Y'){
            $pilihan = 'Y';
            $isi_notifikasi = "Permintaan appointment kamu diterima. Silahkan buka dan lakukan login di aplikasi E-Care (".url('/').") untuk melakukan konseling online dengan Konselor";
        }
        else{
            $pilihan = 'T';
            $keterangan = $request->deskripsitolak;
            $isi_notifikasi = 'Permintaan appointment kamu ditolak, karena: '.$keterangan.'. Silahkan melakukan permintaan chat diwaktu yang berbeda';
        }
        $upd_status = Appointment::find($id)->update([
            'status' => $pilihan,
        ]);
        $appointment = Appointment::find($id);
        $notif = Notification::create([
            'user_id' => $appointment->user_id,
            'message' => $isi_notifikasi,
        ]);
        $event = broadcast(new SendNotification($notif));
        $notif_approve = true;
        // $mhs = Mahasiswa::find($appointment->mahasiswa->nim);
        $mhs = Mahasiswa::find($appointment->mahasiswa->user_role->nik_nim);
        // $email_mhs = 'daniel@dinamika.ac.id';
        $email_mhs = $mhs->nim.'@dinamika.ac.id';
        // if($data_app->jenis_layanan == 'konseling'){
            // $when = Carbon\Carbon::now()->addMinutes(1);
            // Mail::to($email_mhs)->later($when, new NotifEmail('Notif', compact('isi_notifikasi','notif_approve')));
            try {
                //code...
                Mail::send('isi-email', compact('isi_notifikasi','notif_approve'), function ($message) use ($email_mhs)
                {
                    $message->subject('Notifikasi E-Care');
                    $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
                    $message->to($email_mhs);
                });
            } catch (Exception $th) {
                //throw $th;
            }
        // }
        // return redirect()->action('AppointmentController@index')->with('status', 'Data appointment berhasil diupdate');
        return redirect('jadwalkonselor')->with('status', 'Data appointment berhasil diupdate');
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

    public function index_konselor()
    {
        $counselor = Counselor::with('data_user')->get();
        // $appointment = Appointment::with('mahasiswa.user_role.data_mhs')->where('counselor_id', Auth::id())->get();
        $appointment = Appointment::with('mahasiswa.user_role.data_mhs')->orderBy('created_at','desc')->get();
        // $appointment = Appointment::where('status', 'M')->with('mahasiswa.user_role.data_mhs')->orderBy('created_at','desc')->get();
        $appointment_acc = Appointment::where('status', 'Y')->with('mahasiswa.user_role.data_mhs')->orderBy('created_at','desc')->get();
        $user = User::with('user_role.data_mhs.dosen_wali')->find(Auth::id());
        return view('backend.konselor.jadwalkonselor', compact('appointment','appointment_acc'));
    }

    public function update_chat(Request $request, $id)
    {
        $appointment = Appointment::where('user_id', $id)->get()->last()->update([
            'status' => 'S',
        ]);
        $notif = Notification::create([
            'user_id' => $id,
            'message' => 'Konseling via chat Anda telah dianggap selesai. Terimakasih sudah berkonsultasi',
        ]);
        $event = broadcast(new SendNotification($notif));

        return response()->json(['status' => 'success'], 200);
    }

    public function daftar_konseling(Request $request)
    {
        $user = Auth::user();
        if($user->role_id != 2){
            abort(405, "Anda bukan mahasiswa");
        }
        $nim = $user->email;
        $data['counselor'] = Counselor::with('data_user')->get();
        $data['data_appointment'] = Appointment::with('mahasiswa.user_role.data_mhs')->where('user_id', $user->id)->get()->last();
        /* if($data['data_appointment'] && $data['data_appointment']->status != 'Y'){
            return redirect()->route('chat');
        } */
        // $user = User::with('user_role.data_mhs.dosen_wali')->find(Auth::id());
        $data['mhs'] = Mahasiswa::with('dosen_wali')->find($nim);
        return view('backend.mhs.daftarkonseling', $data);
    }

    public function simpan_pendaftaran(Request $request)
    {
        $mhs = Mahasiswa::find($request->nim);
        $cek_mhs = DB::table('db_konseling.mahasiswa')->where('nim', $request->nim)->get()->first();
        $cek_dosen = DB::table('db_konseling.kar_mf')->where('nik', $mhs->dosen_wali->nik)->get()->first();
        // dd($cek_dosen);
        if(!$cek_mhs){
            $var = DB::table('db_konseling.mahasiswa')->insert([
                'NIM' => $request->nim,
                'Nama' => $mhs->nama,
                'Jenis_Kelamin' => '',
                'Prodi' => '',
                'Agama' => '',
            ]);
            // dd($var);
        }
        if(!$cek_dosen){
            DB::table('db_konseling.kar_mf')->insert([
                'Nomor_Induk' => $mhs->dosen_wali->nip,
                'nik' => $mhs->dosen_wali->nik,
                'nama' => $mhs->dosen_wali->nama,
                'pin' => '000000',
                // 'Nama_Dosen' => '',
                // 'Jenis_Kelamin' => '',
                // 'Telepon' => '',
            ]);
            DB::table('db_konseling.dosen')->insert([
                'Nomor_Induk' => $mhs->dosen_wali->nip,
                'nik' => $mhs->dosen_wali->nik,
                'Nama_Dosen' => $mhs->dosen_wali->nama,
                'Jenis_Kelamin' => '',
                'Telepon' => '',
            ]);
        }
        DB::table('db_konseling.konseli')->insert([
            'NIM' => $mhs->nim,
            'Nomor_Induk' => $mhs->dosen_wali->nip,
            'Jurusan' => substr($mhs->prodi(), 3),
            'Telepon_MHS' => $mhs->hp,
            'Golongan_Darah' => $mhs->gol_darah,
            'Alamat' => $mhs->alamat,
            'Agama' => $mhs->nama_agama(),
            'JK_Konseli' => $mhs->sex == 1 ? 'Laki-laki' : 'Perempuan',
            'Telepon_Dosen' => $mhs->dosen_wali->telp,
            'Keluhan' => $request->jenis_masalah,
            'progress' => 0,
            'TGL_Registrasi' => $request->tgl_appointment,
            'Deskripsi'=>$request->description
        ]);
        return redirect()->route('home')->with('status', 'Berhasil mendaftar konseling tatap muka');
    }
}
