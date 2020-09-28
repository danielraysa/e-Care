<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\TestScore;
use Auth;
use DB;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pertanyaan = Question::all();
        return view('backend.mhs.testtingkatmasalah', compact('pertanyaan'));
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
        $user = Auth::user();
        // dd($request->all());
        $id_pert = $request->id_pertanyaan;
        $jml_yes = 0;
        // $jml_no = 0;
        foreach($id_pert as $ids){
            $kode = 'pertanyaan_'.$ids;
            $jawaban = $request->$kode;
            if($jawaban == 'yes'){
                $jml_yes += 1;
            }
            /* else{
                $jml_no += 1;
            } */
        }
        $cari = TestScrore::where('user_id', $user->id)->get()->first();
        if($cari){
            $simpan = TestScore::where('user_id', $user->id)->update([
                'skor' => $jml_yes
            ]);
        }else{
            $simpan = TestScore::create([
                'user_id' => Auth::user()->id,
                'skor' => $jml_yes
            ]);
        }
        if($jml_yes <= 6){
            $nilai = 'Rendah';
            $keterangan= "Tingkat kecemasan yang kamu alami berada pada tingkat rendah. Kami menyarankan kamu kamu melakukan konseling via online agar permasalahan yang kamu hadapi dapat terselesaikan dan tidak semakin membebani kamu";
        }else if($jml_yes > 6 && $jml_yes <= 12){
            $nilai = 'Sedang';
            $keterangan= "Tingkat kecemasan yang kamu alami berada ditingkat sedang. Kami menyarankan kamu untuk segera melakukan konseling via online atau melakukan appointment dengan konselor, agar permasalahanmu yang kamu alami tidak semakin berat.   ";
        }else{
            $nilai = 'Berat';
            $keterangan= "Tingkat masalah yang kamu alami berada pada tingkat berat. Kami menyarankan kamu membuat appointment dengan konselor. Dengan bertemu langsung dengan konselor, kamu akan terbantu dalam menghadapi permasalahan kamu .";
        }
        // $pertanyaan = Question::all();
        return response()->json(compact('nilai','jml_yes','keterangan'), 200);
        // return vieW('backend.mhs.testtingkatmasalah', compact('pertanyaan','nilai','jml_yes'));
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
