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
        if($user->role_id == 1){
            return view('admin.chat', compact('all_users'));
        }else{
            return view('user.chat');
        }
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

    public function sendMessage(Request $request)
    {
        $user = Auth::user();

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
        broadcast(new MyEvent($request->input('message')));
      
        // return ['status' => 'Message Sent!'];
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }
}
