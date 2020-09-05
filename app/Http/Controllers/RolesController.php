<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        // $Roles = DB::table('roles') -> get();
        $Roles = Role::all();
        return view('backend.datamaster.role',['roles' => $Roles]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.datamaster.tambahrole');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* DB::table('roles') -> insert([
            'id' => $request ->id,
            'role_name' => $request ->role_name,
        ]); */
        $role = Role::create([
            'role_name'=> $request -> role_name
        ]);
        return redirect()->action('RolesController@index')->with('status', 'Data Role berhasil ditambahkan');
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
        $roles = Role::find($id);
        //dd($mbti);
        return view('backend.datamaster.tambahrole', compact('roles'));
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
        $roles = Role::find($id)->update([
            'role_name' => $request->role_name
        ]);
        if($roles)
        return redirect(route('roles.index'))->with('status', 'Data Role berhasil diperbarui');
        else
        return redirect(route('roles.index'))->with('status', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete(); 
        return redirect('/roles')->with('status', 'Data Role Berhasil dihapus');
     
        
    }
}
