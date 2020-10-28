<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\RekamMedis;
use App\Major;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $appointment = Appointment::with('mahasiswa.user_role.data_mhs', 'catatan_medis')->where('status', 'S')->orderBy('created_at', 'desc')->get();
        $prodi = Major::all();
        if($request->prodi != ''){
            $appointment = Appointment::with('mahasiswa')->whereHas('mahasiswa', function ($query) use ($request) {
                $query->whereRaw("SUBSTR(email, 3, 5) = '".$request->prodi."'");
            })->orderBy('created_at', 'desc')->get();
            if($request->jenis != ''){
                if($request->jenis == 'bulan'){
                    $waktu = explode('-', $request->waktu);
                    $appointment = Appointment::with('mahasiswa')->whereHas('mahasiswa', function ($query) use ($request) {
                        $query->whereRaw("SUBSTR(email, 3, 5) = '".$request->prodi."'");
                    })->whereRaw("YEAR(created_at) = ? AND MONTH(created_at) = ?", [$waktu[0], $waktu[1]])->orderBy('created_at', 'desc')->get();
                }
                if($request->jenis == 'tahun'){
                    $waktu = $request->waktu;
                    $appointment = Appointment::with('mahasiswa')->whereHas('mahasiswa', function ($query) use ($request) {
                        $query->whereRaw("SUBSTR(email, 3, 5) = '".$request->prodi."'");
                    })->whereRaw("YEAR(created_at) = ?", [$waktu,])->orderBy('created_at', 'desc')->get();
                }
            }
        }
        return view('backend.konselor.laprekammedis', compact('appointment','prodi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $appointment = Appointment::with('mahasiswa.user_role.data_mhs')->find($id);
        // dd($appointment);
        return view('backend.konselor.tambahrekammedis', compact('appointment','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // dd($request->all());
        $rekam = RekamMedis::create([
            'appointment_id' => $id,
            'tgl' => $request->tanggal,
            // 'pertemuan' => $request->pertemuanke,
            // 'umum' => $request->umum,
            // 'belajar' => $request->belajar,
            // 'spesifikasi' => $request->spesifikasi,
            'deskripsi' => $request->deskripsi,
            // 'rasa_aman' => $request->rasaaman,
            // 'kompetensi' => $request->kompetensi,
            // 'aspirasi' => $request->aspirasi,
            // 'semangat' => $request->semangat,
            // 'kesempatan' => $request->kesempatan,
            // 'ram_pembinaan' => $request->rampembinaan,
            // 'ram_teknik' => $request->ramteknik,
            // 'kom_pembinaan' => $request->kompembinaan,
            // 'kom_teknik' => $request->komteknik,
            // 'asp_pembinaan' => $request->asppembinaan,
            // 'asp_teknik' => $request->aspteknik,
            // 'sem_pembinaan' => $request->sempembinaan,
            // 'sem_teknik' => $request->semteknik,
            // 'kes_pembinaan' => $request->kespembinaan,
            // 'kes_teknik' => $request->kesteknik,
            // 'giz_pembinaan' => $request->gizpembinaan,
            // 'pend_pembinaan' => $request->pendpembinaan,
            // 'pso_pembinaan' => $request->psopembinaan,
            // 'bud_pembinaan' => $request->budpembinaan,
            // 'koin_pembinaan' => $request->koinpembinaan,
            // 'p1' => $request->p1,
            // 'p2' => $request->p2,
            // 'p3' => $request->p3,
            'penyelesaian' => $request->penyelesaian,
            'prospek' => $request->prospek,
        ]);

        return redirect()->route('rekammedis.index')->with('status', 'Berhasil menambahkan data rekam medis');
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
        $appointment = Appointment::with('mahasiswa.user_role.data_mhs', 'catatan_medis')->find($id);
        return view('backend.konselor.tambahrekammedis', compact('appointment','id'));
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
