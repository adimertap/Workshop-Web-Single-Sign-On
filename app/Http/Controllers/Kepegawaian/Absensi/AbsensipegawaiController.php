<?php

namespace App\Http\Controllers\Kepegawaian\Absensi;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Retur\Retur;
use App\Model\Kepegawaian\Absensi;
use App\Model\Kepegawaian\Pegawai;
use App\Model\SingleSignOn\Bengkel;
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

        $jumlah_absensi = Absensi::with([
            'Pegawai',
        ])->whereDate('tanggal_absensi', Carbon::today())->count();

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        $pegawai = Pegawai::all();

        return view('pages.kepegawaian.absensi.absensi',['jumlah_pegawai'=> Pegawai::count()], compact('absensi','jumlah_absensi','pegawai','today','tanggal'));
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

        $bengkel = Bengkel::first();
        $jammasuk = Carbon::now()->format('H:i:s');
        if($jammasuk > $bengkel->jam_masuk_kerja){
            $absensi = 'Terlambat';
        }else{
            $absensi = 'Absen_Pagi';
        }
        
        $absensi = Absensi::create([
            'id_pegawai'=>$request->id_pegawai,
            'tanggal_absensi'=>Carbon::today(),
            'absensi'=>$absensi,
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
