<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Mahasiswa;
use App\Appointment;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Events\PrivateMessageSent;
use Pusher;
use Auth;
use App\Events\ChatEvent;
use App\Events\OnlineUser;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }
   
    public function privateMessages(User $user)
    {
        $privateCommunication= Message::with('user')
        ->where(['user_id'=> auth()->id(), 'receiver_id'=> $user->id])
        ->orWhere(function($query) use($user){
            $query->where(['user_id' => $user->id, 'receiver_id' => auth()->id()]);
        })
        ->get();

        return $privateCommunication;
    }

    public function sendMessage(Request $request)
    {
        if(request()->has('file')){
            $filename = request('file')->store('chat');
            $message=Message::create([
                'user_id' => request()->user()->id,
                'image' => $filename,
                'receiver_id' => request('receiver_id')
            ]);
        }else{
            $message = auth()->user()->messages()->create(['message' => $request->message]);
        }
        broadcast(new MessageSent(auth()->user(),$message->load('user')))->toOthers();
        return response(['status'=>'Message sent successfully','message'=>$message]);

    }

    public function sendPrivateMessage(Request $request,User $user)
    {
        if(request()->has('file')){
            $filename = request('file')->store('chat');
            $message=Message::create([
                'user_id' => request()->user()->id,
                'image' => $filename,
                'receiver_id' => $user->id
            ]);
        }else{
            $input=$request->all();
            $input['receiver_id']=$user->id;
            $message=auth()->user()->messages()->create($input);
        }

        broadcast(new PrivateMessageSent($message->load('user')))->toOthers();
        
        return response(['status'=>'Message private sent successfully','message'=>$message]);

    }

    public function listchat()
    {
        if(Auth::id() == 1 || Auth::user()->role_id == 4){ // admin dan konselor
            $users = User::all()->except(auth()->id());
        }else{
            // $users = User::whereIn('role_id',[1])->get();
            $users = User::where('id',14)->get();
            // $appointment = Appointment::where('user_id',Auth::id())->orderBy('created_at')->get()->last();
            $appointment = Appointment::where('user_id',Auth::id())->get()->last();
            if(!$appointment || $appointment->jenis_layanan != 'chatting' || in_array($appointment->status, ['M','S'])){
                $user = Auth::user();
                $nim = $user->email;
                $data['mhs'] = Mahasiswa::find($nim);
                if($appointment){
                    $data['appointment'] = $appointment;
                }
                return view('backend.mhs.buatappointment', $data);
            }
        }
        // $event = broadcast(new OnlineUser(Auth::user()));
        return view('chat', compact('users'));
    }

    public function listmessage($id)
    {
        $messages = Message::with('user')
        ->where(['user_id'=> auth()->id(), 'receiver_id'=> $id])
        ->orWhere(function($query) use($id){
            $query->where(['user_id' => $id, 'receiver_id' => auth()->id()]);
        })->get();
        $user_receiver = User::find($id);
        // dd($messages);
        return view('chat-card', compact('user_receiver','messages'));
    }

    public function teschat(Request $request)
    {
        $user = Auth::user();
        /* $app_id = env('PUSHER_APP_ID'); // App ID
        $app_key = env('PUSHER_APP_KEY'); // App Key
        $app_secret = env('PUSHER_APP_SECRET'); // App Secret
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher(
            $app_key,
            $app_secret,
            $app_id,
            $options
        ); */

        // Check the receive message
        if(isset($request->message) && !empty($request->message)) {
            $data['message'] = $request->message;
            $data['user_id'] = $user->id;
            $data['receiver_id'] = (int)$request->receiver;
            $data['time'] = date('H:i');
            $message = Message::create([
                'user_id' => $user->id,
                'receiver_id' => $request->receiver,
                'message' => $request->message,
            ]);
            
            $event = broadcast(new ChatEvent($data));
            if($event){
                return $data;
            }else{
                return "error";
            }
        }
    }

}
