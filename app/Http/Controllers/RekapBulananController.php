<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\RekamMedis;
use App\Major;
use PDF;

class RekapBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rekam = RekamMedis::with('data_appointment.mahasiswa')->orderBy('tgl', 'desc')->get();
        $prodi = Major::all();
        if($request->prodi != ''){
            $rekam = RekamMedis::with(['data_appointment.mahasiswa' => function ($query) use ($request) {
                $query->whereRaw("SUBSTR(email, 3, 5) = '".$request->prodi."'");
            }])->orderBy('tgl', 'desc')->get();
            if($request->jenis != ''){
                if($request->jenis == 'bulan'){
                    $waktu = explode('-', $request->waktu);
                    $rekam = RekamMedis::with('data_appointment.mahasiswa')->whereHas('data_appointment.mahasiswa', function ($query) use ($request) {
                        $query->whereRaw("SUBSTR(email, 3, 5) = '".$request->prodi."'");
                    })->whereRaw("YEAR(tgl) = ? AND MONTH(tgl) = ?", [$waktu[0], $waktu[1]])->orderBy('tgl', 'desc')->get();
                }
                if($request->jenis == 'tahun'){
                    $waktu = $request->waktu;
                    $rekam = RekamMedis::with('data_appointment.mahasiswa')->whereHas('data_appointment.mahasiswa', function ($query) use ($request) {
                        $query->whereRaw("SUBSTR(email, 3, 5) = '".$request->prodi."'");
                    })->whereRaw("YEAR(tgl) = ?", [$waktu,])->orderBy('tgl', 'desc')->get();
                }
            }
        }
        if($request->export == 'true'){
            // return $this->export_pdf($request);
            $pdf = PDF::loadView('backend.fitur.export-laporan', compact('request','rekam'));
            return $pdf->stream();
        }else{
            return view('backend.konselor.laprekapbulan', compact('request','rekam', 'prodi'));
        }
    }

    public function list_waktu(Request $request)
    {
        switch ($request->waktu) {
            case 'bulan':
                $data = Appointment::selectRaw("CONCAT(year(tgl_appointment), '-', month(tgl_appointment)) year, CONCAT(monthname(tgl_appointment), ' ', year(tgl_appointment)) text")
                ->groupBy('year', 'text')
                ->orderBy('year', 'desc')
                ->get();
                break;
            case 'semester':
                $data = Appointment::selectRaw('year(tgl_appointment) year, month(tgl_appointment) month, count(*) data')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->get();
                break;
            case 'tahun':
                $data = Appointment::selectRaw('year(tgl_appointment) year, year(tgl_appointment) text')
                ->groupBy('year','text')
                ->orderBy('year', 'desc')
                ->get();
                break;
            default:
                $data = "";
                break;
        }
        return response()->json($data, 200);
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
