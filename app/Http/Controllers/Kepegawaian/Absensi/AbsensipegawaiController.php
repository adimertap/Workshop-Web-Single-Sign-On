<?php

namespace App\Http\Controllers\Kepegawaian\Absensi;

use App\Http\Controllers\Controller;
use App\Model\Kepegawaian\Absensi;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AbsensipegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = Absensi::with([
            'Pegawai',
        ])->whereDate('tanggal_absensi', Carbon::today())->get();

        $blt = date('D, d/m/Y');

        $pegawai = Pegawai::all();

        return view('pages.kepegawaian.absensi.absensi', compact('absensi','pegawai','blt'));
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


        $absensi = Absensi::create([
            'id_pegawai'=>$request->id_pegawai,
            'tanggal_absensi'=>Carbon::today(),
            'absensi'=>$request->absensi,
            'keterangan'=>$request->keterangan,
            'jam_masuk' => Carbon::now()->format('H:i:s')
        ]);
        
        $absensi->save();

        return redirect()->back()->with('messageberhasil','Berhasil Melakukan Absensi');

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

    public function pulang(Request $request, $id_absensi)
    {
        $request->validate([
            'status' => 'required|in:Absen_Pagi,Masuk,Alpha,Ijin,Sakit,Cuti'
        ]);

        $absensi = Absensi::findOrFail($id_absensi);
        $absensi->absensi = $request->status;
        $absensi->jam_pulang = Carbon::now()->format('H:i:s');

        $absensi->update();

        return redirect()->back()->with('messageberhasil','Berhasil Melakukan Absensi');

    }
}
