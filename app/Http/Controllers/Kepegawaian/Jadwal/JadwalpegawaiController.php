<?php

namespace App\Http\Controllers\Kepegawaian\Jadwal;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Retur\Retur;
use App\Model\Kepegawaian\Jadwal;
use App\Model\Kepegawaian\Pegawai;
use App\Model\SingleSignOn\Bengkel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class JadwalpegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bengkel = Auth::user()->bengkel;

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');
       

        return view('pages.kepegawaian.jadwal.jadwal', compact('today', 'tanggal','bengkel'));
    }

    public function getJadwal(Request $request){
        $id_pegawai = Pegawai::join('tb_kepeg_master_jabatan', 'tb_kepeg_master_pegawai.id_jabatan', 'tb_kepeg_master_jabatan.id_jabatan')
        ->where('nama_jabatan', '!=', 'Owner')->pluck('id_pegawai')->toArray();

        // return $request->date;

        $pegawaimasuk = Pegawai::leftJoin('tb_kepeg_jadwal', 'tb_kepeg_master_pegawai.id_pegawai', 'tb_kepeg_jadwal.id_pegawai')
        ->join('tb_kepeg_master_jabatan', 'tb_kepeg_master_pegawai.id_jabatan', 'tb_kepeg_master_jabatan.id_jabatan')
        ->select('tb_kepeg_master_pegawai.id_pegawai', 'nama_pegawai','nama_jabatan','tanggal_jadwal')
        ->whereIn('tb_kepeg_master_pegawai.id_pegawai', $id_pegawai)
        ->whereDate('tanggal_jadwal', $request->date);

        // return $pegawaimasuk->get();

        $pegawailibur = Pegawai::leftJoin('tb_kepeg_jadwal', function($join) use($request){
            $join->on('tanggal_jadwal', '=',DB::raw("'".$request->date."'"))->on('tb_kepeg_jadwal.id_pegawai', 'tb_kepeg_master_pegawai.id_pegawai');

        })
        ->join('tb_kepeg_master_jabatan', 'tb_kepeg_master_pegawai.id_jabatan', 'tb_kepeg_master_jabatan.id_jabatan')
        ->select('tb_kepeg_master_pegawai.id_pegawai', 'nama_pegawai','nama_jabatan','tanggal_jadwal')
        ->whereIn('tb_kepeg_master_pegawai.id_pegawai', $id_pegawai)
        // ->whereDate('tanggal_jadwal', $request->date)
        ->get();

        return $pegawailibur;
    }

    public function masuk(Request $request){

        $jadwal = new Jadwal;
        $jadwal->id_pegawai = $request->id_pegawai;
        $jadwal->tanggal_jadwal = $request->date;
        $jadwal->id_bengkel = Auth::user()->id_bengkel;

        $jadwal->save();
    }

    public function libur(Request $request){
        // return $request->date;
        $jadwal = Jadwal::where('id_pegawai', $request->id_pegawai)->whereDate('tanggal_jadwal', $request->date)->first();
        // return $jadwal;
        $jadwal->delete();
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
