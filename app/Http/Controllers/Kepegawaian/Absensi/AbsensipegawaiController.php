<?php

namespace App\Http\Controllers\Kepegawaian\Absensi;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Retur\Retur;
use App\Model\Kepegawaian\Absensi;
use App\Model\Kepegawaian\Jadwal;
use App\Model\Kepegawaian\Pegawai;
use App\Model\SingleSignOn\Bengkel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

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

        $bengkel = Auth::user()->bengkel;

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');
        $pegawai = Pegawai::all();

        $jadwalpegawai = Jadwal::with(['Pegawai'])->whereDate('tanggal_jadwal', Carbon::today())->get();

        return view('pages.kepegawaian.absensi.absensi',['jumlah_pegawai'=> Jadwal::with(['Pegawai'])->whereDate('tanggal_jadwal', Carbon::today())->count()], compact('absensi','jumlah_absensi','pegawai','today','tanggal','bengkel','jadwalpegawai'));
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
        $absen = Absensi::where('id_pegawai',$request->id_pegawai)->first();
      
        $bengkel = Bengkel::first();
        $jammasuk = Carbon::now()->format('H:i:s');
        if($jammasuk > $bengkel->jam_buka_bengkel && ($request->absensi == 'Absen_Pagi' || $request->absensi == 'Masuk')){
            $keterangan = 'Terlambat';
        }else{
            $keterangan = $request->keterangan;
        }

        $absensi = Absensi::create([
            'id_pegawai'=>$request->id_pegawai,
            'tanggal_absensi'=>Carbon::today(),
            'absensi'=>$request->absensi,
            'keterangan'=>$keterangan,
            'jam_masuk' => Carbon::now()->format('H:i:s'),
            'id_bengkel' => $request['id_bengkel'] = Auth::user()->id_bengkel
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
