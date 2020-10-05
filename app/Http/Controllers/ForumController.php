<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\User;
use App\Forum;
use App\ForumComment;
use Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $forum = Forum::with('post_user','komentar_forum')->get();
        // dd($forum);
        return view('backend.fitur.forum', compact('forum'));
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
        $create = Forum::create([
            'user_id' => Auth::user()->id,
            'deskripsi_forum' => $request->deskripsi_forum
        ]);
        return redirect()->route('forum-group.index')->with('status','Postingan berhasil dibuat');
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
        $forum = Forum::with('post_user','komentar_forum.komentar_user')->find($id);
        return view('backend.fitur.forum-komentar', compact('forum'));
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

    public function post_komentar($id, Request $request)
    {
        //
        $create = ForumComment::create([
            'forum_id' => $id,
            'user_id' => Auth::user()->id,
            'komentar' => $request->komentar
        ]);
        return redirect()->back()->with('status','Komentar berhasil dibuat');
    }
}
