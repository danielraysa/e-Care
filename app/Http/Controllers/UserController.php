<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserRole;
use App\Mahasiswa;
use App\Karyawan;
use App\Counselor;
use App\Role;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::with('user_role')->get();
        $mahasiswa = Mahasiswa::with('role_mhs')->get();
        $karyawan = Karyawan::with('role_kary')->where('status', 'A')->get();
        $role = Role::all();
        $userrole = UserRole::all();
        // dd($karyawan);
        return view('admin.user', compact('user', 'mahasiswa', 'karyawan','role','userrole'));
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
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->data_tabel,
            // 'password' => bcrypt($request->password),
            'password' => bcrypt('password'),
            'role_id' => $request->user_role,
        ]);
        $user_role = UserRole::create([
            'user_id' => $user->id,
            'nik_nim' => $request->data_tabel,
            'role_id' => $request->user_role,
        ]);
        if($request->user_role == 4){
            $counselor = Counselor::create([
                'user_id' => $user->id,
            ]);
        }
        return redirect()->action('UserController@index')->with('status', 'Data user berhasil ditambahkan');
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
}
