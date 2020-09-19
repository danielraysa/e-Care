<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
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
        return view('admin.pertanyaan', compact('pertanyaan'));
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
        $pertanyaan = Question::create([
            'description' => $request->pertanyaan
        ]);
        return redirect()->action('QuestionController@index')->with('status', 'Data Pertanyaan Berhasil Ditambahkan');
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
        $pertanyaan = Question::find($id);
        //dd($mbti);
        return response()->json($pertanyaan, 200);
        // return view('admin.pertanyaan', compact('pertanyaan'));
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
        $pertanyaan = Question::find($id)->update([
            'description' => $request->pertanyaan
        ]);
        if($pertanyaan)
        return redirect(route('pertanyaan.index'))->with('status', 'Data Pertanyaan Berhasil Diperbarui');
        else
        return redirect(route('pertanyaan.index'))->with('status', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Question::find($id);
        $pertanyaan->delete(); 
        return redirect('/pertanyaan')->with('status', 'Data Pertanyaan Berhasil Dihapus');
    }

    public function test_tingkat()
    {
        $pertanyaan = Question::all();
        return vieW('backend.mhs.testtingkatmasalah', compact('pertanyaan'));
    }

    public function test_tingkat_hasil(Request $request)
    {
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

}
