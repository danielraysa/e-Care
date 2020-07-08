<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Mahasiswa;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Events\PrivateMessageSent;
use Pusher;
use Auth;
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
        $mahasiswa = Mahasiswa::all()->random(10);
        return view('tes-chat', compact('mahasiswa'));
    }

    public function teschat(Request $request)
    {
        $user = Auth::user();
        // Change the following with your app details:
        // Create your own pusher account @ www.pusher.com
        $app_id = env('PUSHER_APP_ID'); // App ID
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
        );

        // Check the receive message
        if(isset($request->message) && !empty($request->message)) {    
            $data['message'] = $request->message;
            $data['user_id'] = $user->id;
            $data['user_name'] = $user->name;
            $data['time'] = date('H:i');
            // Return the received message
            if($pusher->trigger('test_channel', 'my_event', $data)) {              
                echo 'success';        
            } else {
                echo 'error';  
            }
        }
    }
   
}
