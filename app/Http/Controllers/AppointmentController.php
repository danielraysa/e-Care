<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\User;
use App\Counselor;
use App\Mahasiswa;
use App\Notification;
use App\Events\SendNotification;
use App\Events\ToastNotification;
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
        $nim = $user->email;
        $counselor = Counselor::with('data_user')->get();
        $mhs = Mahasiswa::find($nim);
        $notification = Notification::where('user_id', $user->id)->get();
        // $user = User::with('user_role.data_mhs.dosen_wali')->find(Auth::id());
        /* $user = DB::table('users')
            ->join('v_mhs', 'users.email', '=', 'v_mhs.nim')
            ->join('v_karyawan', 'v_mhs.dosen_wl', '=', 'v_karyawan.nik')
            ->get()->first(); */
        // dd($user);
        return view('backend.mhs.buatappointment', compact('mhs','counselor','notification'));
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
        $appointment = Appointment::create([
            'user_id' => $user->id,
            // 'counselor_id' => $request->counselor,
            'counselor_id' => 1, // admin
            'tgl_appointment' => $request->tgl_appointment,
            'jenis_problem' => $request->jenis_masalah,
            'jenis_layanan' => $request->jenis_layanan,
            'description' => $request->description,
            'status' => 'M',
            // 'created_at' => date('Y-m-d H:i:s')
        ]);
        /* $notif = Notification::create([
            'user_id' => $request->counselor,
            'message' => 'Ada permintaan appointment baru',
        ]); */
        // buat admin
        $notif = Notification::create([
            'user_id' => 14,
            'message' => 'Ada permintaan/appointment baru',
        ]);
        $isi_notifikasi = " melakukan permintaan chat untuk konseling online. Silakan buka aplikasi www.e-care.com untuk memberikan approval.";
        $nama = Auth::user()->name;
        $event = broadcast(new SendNotification($notif));
        $notif_appointment = true;
        Mail::send('isi-email', compact('isi_notifikasi', 'nama', 'notif_appointment'), function ($message)
        {
            $message->subject('Notifikasi E-Care');
            $message->from('anelzraysa@mail.com', 'E-Care');
            // $message->to($email_mhs);
            $message->to('adistriani@gmail.com');
        }); 
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
            $isi_notifikasi = 'Permintaan appointment kamu diterima. Silahkan buka aplikasi E-Care untuk melakukan konseling online dengan Konselor  ';
        }
        else{
            $pilihan = 'T';
            $isi_notifikasi = 'Permintaan appointment kamu ditolak, silahkan buat appointment dengan tanggal yang berbeda';
        }
        $appointment = Appointment::find($id)->update([
            'status' => $pilihan,
        ]);
        $data_app = Appointment::find($id);
        $tgl = $data_app->tgl_appointment;
        $notif = Notification::create([
            'user_id' => $data_app->user_id,
            'message' => 'Permintaan appointment/chat telah diterima',
        ]);
        $event = broadcast(new SendNotification($notif));
        $notif_approve = true;
        // if($data_app->jenis_layanan == 'konseling'){
            //$when = now()->addMinutes(2);
            // Mail::to('adistriani@gmail.com')->later($when, new MailableClass);
            Mail::send('isi-email', compact('isi_notifikasi', 'tgl','notif_approve'), function ($message)
            {
                $message->subject('Notifikasi E-Care');
                $message->from('anelzraysa@mail.com', 'E-Care');
                // $message->to($email_mhs);
                $message->to('adistriani@gmail.com');
            }); 
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
        $appointment = Appointment::where('status', 'M')->with('mahasiswa.user_role.data_mhs')->orderBy('tgl_appointment','desc')->get();
        $appointment_acc = Appointment::where('status', 'Y')->with('mahasiswa.user_role.data_mhs')->orderBy('tgl_appointment','desc')->get();
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

}
