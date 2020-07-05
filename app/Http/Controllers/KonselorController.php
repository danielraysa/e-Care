<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counselor;

class KonselorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.mhs.daftarkonselor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.konselor.tambahkonselor');
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
        $conselor = Counselor::create([
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'nama_institusi' => $request->nama_institusi,
            'lisensi' => $request->lisensi,
            'penghargaan' => $request->penghargaan,
            'bidang_keahlian' => $request->bidang_keahlian,
            'topik_penelitian' => $request->topik_penelitian,
            'perusahaan_terakhir' => $request->perusahaan_terakhir,
            'jabatan' => $request->jabatan,
            'lama_bekerja' => $request->lama_bekerja,
            'pelatihan' => $request->pelatihan,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            // 'created_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->action('KonselorController@index')->with('status', 'Data konselor berhasil ditambahkan');
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
