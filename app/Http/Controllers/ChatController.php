<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Message;
Use App\User;
use App\Events\MyEvent;
use App\Events\MessageSent;
use Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $all_users = User::where('id', '!=', $user->id)->get();
        return view('admin.chat', compact('all_users'));
        /* if($user->role_id == 1){
            return view('admin.chat', compact('all_users'));
        }else{
            return view('user.chat');
        } */
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

    public function getUsers(){
        $user = Auth::user();
        return User::where('id','!=', $user->id)->get();
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message = $request->input('message');
        /* $message = $user->messages()->create([
            'message' => $request->input('message')
        ]); */
        // dd($user);
        /* $message = Message::create([
            'user_id' => $user->id,
            'receiver_id' => 2,
            'message' => $request->input('message'),
            // 'created_at' => date('Y-m-d H:i:s')
        ]); */
      
        // broadcast(new MessageSent($user, $message))->toOthers();
        // event(new MyEvent($request->input('message')));
        // broadcast(new MyEvent($request->input('message')));
        broadcast(new MessageSent($user, $message->load('user')))->toOthers();
        return response(['status' => 'Message sent successfully', 'message' => $message]);
        // return ['status' => 'Message Sent!'];
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    // public function privateMessages(User $user)
    public function privateMessages($user)
    {
        $privateCommunication = Message::with('user')
        ->where(['user_id' => auth()->id(), 'receiver_id' => $user])
        ->orWhere(function($query) use($user){
            $query->where(['user_id' => $user, 'receiver_id' => auth()->id()]);
        })
        ->get();

        return $privateCommunication;
    }


    // public function sendPrivateMessage(Request $request,User $user)
    public function sendPrivateMessage(Request $request, $user)
    {
        if(request()->has('file')){
            $filename = request('file')->store('chat');
            $message = Message::create([
                'user_id' => request()->user()->id,
                'image' => $filename,
                'receiver_id' => $user
            ]);
        }else{
            $input = $request->all();
            $input['receiver_id'] = $user;
            $message = auth()->user()->messages()->create($input);
        }

        broadcast(new PrivateMessageSent($message->load('user')))->toOthers();
        
        return response(['status'=>'Message private sent successfully','message' => $message]);

    }
}
