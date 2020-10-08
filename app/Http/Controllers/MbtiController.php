<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mbti;
use App\MhsMbti;
use App\Mahasiswa;
use Auth;

class MbtiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        // $mbti= DB::table('mbti')->get();
        $mbti = Mbti::all();
        // $mahasiswa = Mahasiswa::all();
        // return view('backend.datamaster.mbti', ['data_mbti' => $mbti, ]);
        return view('backend.datamaster.mbti', compact('mbti'));
    }

    public function dropdownindex()
    {
        // $mbti= DB::table('mbti')->get();
        $mbti = Mbti::all();
        return view('backend.mhs.testmbti', ['mbti' => $mbti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.datamaster.tambahmbti');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = Mbti::create([
        // DB::table('mbti') -> insert([
            // 'id' => $request->id,
            'mbti_name' => $request->mbti_name,
        ]);

        return redirect()->action('MbtiController@index')->with('status', 'Data MBTI Berhasil Ditambahkan');
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
        $mbti = Mbti::find($id);
        //dd($mbti);
        return view('backend.datamaster.tambahmbti', compact('mbti'));
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
        
        $upd = Mbti::find($id)->update([
            'mbti_name' => $request->mbti_name
        ]);
        if($upd)
        return redirect(route('mbti.index'))->with('status', 'Data MBTI Berhasil Diperbarui');
        else
        return redirect(route('mbti.index'))->with('status', 'Error');
    // alihkan halaman edit ke halaman books
    //return view('backend.datamaster.mbti')->with('update', 'Data MBTI berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $mbti = Mbti::find($id);
        $mbti->delete();
        // $mbti->softDeletes();
        return redirect('/tabelmbti')->with('status', 'Data MBTI Berhasil Dihapus');
    }

    public function hasilmbti(Request $request){
        //$nim = Auth::user()->id;
        $nim = Auth::user()->email;
        $pil_mbti = $request->testmbti;
        // dd($nim);
        $mhs_mbti = MhsMbti::create([
            'nim' => $nim,
            'id_mbti' => $pil_mbti,
        ]);
        //dd($mhs_mbti);
        return redirect(url('testmbti'))->with('status', 'Data Telah Disimpan');
    }

}
