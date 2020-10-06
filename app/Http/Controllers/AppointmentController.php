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
        $data['counselor'] = Counselor::with('data_user')->get();
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
        $appointment = Appointment::create([
            'user_id' => $user->id,
            // 'counselor_id' => $request->counselor,
            'counselor_id' => 14, // konselor
            'tgl_appointment' => $request->tgl_appointment,
            'jenis_problem' => $request->jenis_masalah,
            'jenis_layanan' => $request->jenis_layanan,
            'description' => $request->description,
            'status' => 'M',
            // 'created_at' => date('Y-m-d H:i:s')
        ]);
        // buat notif
        $notif = Notification::create([
            // 'user_id' => $request->counselor,
            'user_id' => 14,
            'message' => 'Ada permintaan/appointment baru',
        ]);
        
        $nama = Auth::user()->name;
        $event = broadcast(new SendNotification($notif));
        $notif_appointment = true;
        Mail::send('isi-email', compact('nama', 'appointment', 'notif_appointment'), function ($message)
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
            $isi_notifikasi = 'Permintaan appointment kamu diterima. Silahkan buka aplikasi E-Care untuk melakukan konseling online dengan Konselor';
        }
        else{
            $pilihan = 'T';
            $isi_notifikasi = 'Permintaan appointment kamu ditolak, silahkan buat appointment dengan tanggal yang berbeda';
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
        // if($data_app->jenis_layanan == 'konseling'){
            //$when = now()->addMinutes(2);
            // Mail::to('adistriani@gmail.com')->later($when, new MailableClass);
            Mail::send('isi-email', compact('isi_notifikasi','notif_approve'), function ($message)
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

}
