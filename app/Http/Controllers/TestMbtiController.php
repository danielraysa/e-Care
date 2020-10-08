<?php

namespace App\Http\Controllers;

use App\Mbti;
use App\TestMbti;
use Illuminate\Http\Request;
use Auth;

class TestMbtiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->role_id == 4){
            $test_mbti = TestMbti::with('user_mbti', 'data_mbti')->get();
            return view('backend.konselor.hasilmbti', compact('test_mbti'));    
        }
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
        $test_mbti = TestMbti::create([
            'user_id' => Auth::user()->id,
            'mbti_id' => $request->testmbti
        ]);
        return redirect()->route('testmbti.index')->with('status', 'Berhasil menyimpan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestMbti  $testMbti
     * @return \Illuminate\Http\Response
     */
    public function show(TestMbti $testMbti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestMbti  $testMbti
     * @return \Illuminate\Http\Response
     */
    public function edit(TestMbti $testMbti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestMbti  $testMbti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestMbti $testMbti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestMbti  $testMbti
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestMbti $testMbti)
    {
        //
    }
}
