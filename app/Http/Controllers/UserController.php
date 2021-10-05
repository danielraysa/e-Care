<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserRole;
use App\Mahasiswa;
use App\Karyawan;
use App\Counselor;
use App\HistoriMhs;
use App\Role;
use Illuminate\Support\Facades\Cache;

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
        // ini_set("memory_limit","1G");
        // set_time_limit(90);
        // $his = HistoriMhs::whereNotIn('sts_mhs', ['O','L'])->where('semester', '202')->get();
        // dd($his->count());
        $user = User::with('user_role')->get();
        /* $mahasiswa = Mahasiswa::with(['his_status' => function ($query) {
            $query->orderBy('semester', 'desc');
        },'role_mhs'])->whereHas('his_status', function ($query) {
            $query->whereNotIn('sts_mhs', ['O','L'])->where('semester', '202');
        })->get(); */
        $seconds = 5 * 60;
        $mahasiswa = Cache::remember('data_users', $seconds, function () {
            $data_mhs = Mahasiswa::with(['his_status' => function ($query) {
                $query->orderBy('semester', 'desc');
            },'role_mhs'])->whereHas('his_status', function ($query) {
                $query->whereNotIn('sts_mhs', ['O','L'])->where('semester', '202');
            })->get();
            return $data_mhs;
        });
        // dd($mahasiswa->count());
        // $karyawan = Karyawan::with('role_kary')->whereRaw("LENGTH(nik) = 6")->where('status', 'A')->get();
        $role = Role::all();
        $userrole = UserRole::all();
        // return view('backend.datamaster.user', compact('user', 'mahasiswa', 'karyawan','role','userrole'));
        return view('backend.datamaster.user', compact('user', 'mahasiswa','role','userrole'));
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
        // dd($request->all());
        $check = User::where('email', $request->data_tabel)->get()->first();
        if($check){
            // dd('update');
            $check->update([
                'password' => bcrypt($request->password),
                // 'password' => bcrypt('password'),
                'role_id' => $request->user_role,
            ]);
            $user_role = UserRole::where('user_id', $check->id)->get()->first()->update([
                // 'user_id' => $user->id,
                'nik_nim' => $request->data_tabel,
                'role_id' => $request->user_role,
            ]);
            /* if($request->user_role == 4){
                $counselor = Counselor::create([
                    'user_id' => $user->id,
                ]);
            } */
        }else{
            // dd('create new');
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->data_tabel,
                'password' => bcrypt($request->password),
                // 'password' => bcrypt('password'),
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
