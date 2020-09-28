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

}
