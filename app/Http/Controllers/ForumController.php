<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\User;
use App\Forum;
use App\ForumComment;
use App\Notification;
use App\Events\SendNotification;
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
        $forum = Forum::with('post_user','komentar_forum')->orderBy('created_at', 'desc')->get();
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
        $user = User::find(Auth::user()->id);
        $notif = Notification::create([
            'user_id' => 14, //
            'message' => $user->name.' telah membuat forum/post baru',
        ]);
        $event = broadcast(new SendNotification($notif));
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
        $forum = Forum::with('post_user','komentar_forum.komentar_user')->find($id);
        if($forum->user_id != Auth::user()->id){
            return redirect()->route('forum-group.index')->with('status', 'Tidak bisa edit post milik orang lain');
        }
        return view('backend.fitur.forum-edit', compact('forum'));
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
        $update = Forum::where('id', $id)->update([
            'deskripsi_forum' => $request->deskripsi
        ]);
        return redirect()->route('forum-group.show', $id)->with('status', 'Berhasil memperbarui forum');
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
        $hapus_komen = ForumComment::where('forum_id', $id)->delete();
        $hapus_forum = Forum::where('id', $id)->delete();
        return redirect()->back()->with('status','Forum berhasil dihapus');
    }

    public function post_komentar($id, Request $request)
    {
        //
        $create = ForumComment::create([
            'forum_id' => $id,
            'user_id' => Auth::user()->id,
            'komentar' => $request->komentar
        ]);
        // $forum = Forum::with('post_user')->where('id', $id)->get()->first();
        $forum = Forum::with('post_user')->find($id);
        $user = User::find(Auth::user()->id);
        // notif untuk konselor
        $konselor = User::where('role_id', 4)->first();
        if(Auth::user()->role_id != 4 || Auth::user()->id != 14){
            $notif_konselor = Notification::create([
                'user_id' => $konselor->id,
                'message' => $user->name.' memberi komentar pada forum/post yang dibuat oleh '.$forum->post_user->name,
            ]);
            $event = broadcast(new SendNotification($notif_konselor));
        }
        // notif untuk user
        $notif_user = Notification::create([
            'user_id' => $forum->user_id, //
            'message' => $user->name.' memberi komentar pada forum/post yang dibuat oleh kamu',
        ]);
        $event_user = broadcast(new SendNotification($notif_user));
        return redirect()->back()->with('status','Komentar berhasil dibuat');
    }

    public function update_komentar($id, Request $request)
    {
        //
        $update = ForumComment::where('id', $id)->update([
            'komentar' => $request->komentar
        ]);
        $komentar = ForumComment::find($id);
        $forum = Forum::with('post_user')->find($komentar->forum_id);
        $user = User::find(Auth::user()->id);
        // notif untuk konselor
        $konselor = User::where('role_id', 4)->first();
        if(Auth::user()->role_id != 4 || Auth::user()->id != 14){
            $notif_konselor = Notification::create([
                'user_id' => $konselor->id, //
                'message' => $user->name.' memperbarui komentar pada forum/post yang dibuat oleh '.$forum->post_user->name,
            ]);
            $event = broadcast(new SendNotification($notif_konselor));
        }
        // notif untuk user
        $notif_user = Notification::create([
            'user_id' => $forum->user_id, //
            'message' => $user->name.' memperbarui komentar pada forum/post yang dibuat oleh kamu',
        ]);
        $event_user = broadcast(new SendNotification($notif_user));
        return redirect()->back()->with('status','Komentar berhasil diperbarui');
    }
}
