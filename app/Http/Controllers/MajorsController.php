<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Major;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$Majors = DB::table('majors')-> get();
        $Majors = Major::all();
        return view(' backend.datamaster.programstudi',['majors' => $Majors]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.datamaster.tambahprodi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //
        // $Majors = Major::create([
        //     'kode_prodi'=> $request -> kode_prodi,
        //     'major_name'=> $request -> major_name,

        // ]);

        $major = Major::create([
            'kode_prodi'=> $request -> kode_prodi,
            'major_name' => $request -> major_name
        ]);
    
        return redirect()->action('MajorsController@index')->with('status', 'Data Program Studi Berhasil Ditambahkan');
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
        $major = Major::find($id);
        //dd($mbti);
        return view('backend.datamaster.tambahprodi', compact('major'));
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
        $major = Major::find($id)->update([
            'kode_prodi' => $request->kode_prodi,
            'major_name' => $request->major_name
        ]);
        if($major)
        return redirect(route('prodi.index'))->with('status', 'Data Program Studi Berhasil Diperbarui');
        else
        return redirect(route('prodi.index'))->with('status', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $major = Major::find($id);
        $major->delete(); 
        return redirect('/prodi')->with('status', 'Data Program Studi Berhasil Dihapus');
    }
}
