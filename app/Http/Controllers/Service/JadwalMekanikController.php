<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Model\Kepegawaian\Absensi;
use App\Model\Kepegawaian\Jabatan;
use App\Model\Kepegawaian\Pegawai;
use App\Model\Service\JadwalMekanik;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalMekanikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mekanik = Jabatan::with('pegawai', 'pegawai.absensi_mekanik')->where('nama_jabatan', 'Mekanik')->get();
        // $mekanik_asli = $mekanik[0]->pegawai;

        $pegawai = Pegawai::leftJoin('tb_kepeg_absensi', 'tb_kepeg_master_pegawai.id_pegawai', 'tb_kepeg_absensi.id_pegawai')
        ->join('tb_kepeg_master_jabatan', 'tb_kepeg_master_pegawai.id_jabatan', 'tb_kepeg_master_jabatan.id_jabatan')
        ->select('tb_kepeg_master_pegawai.id_pegawai', 'nama_pegawai','nama_jabatan','tanggal_absensi','jam_masuk')
        ->where('nama_jabatan', '=', 'Mekanik')
        ->whereDate('tanggal_absensi',Carbon::today() )->get();
        
        // return $pegawai;

        // return $mekanik_asli;

        return view('pages.service.jadwal_mekanik.main', compact('pegawai'));
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
     * @param  \App\JadwalMekanik  $jadwalMekanik
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalMekanik $jadwalMekanik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JadwalMekanik  $jadwalMekanik
     * @return \Illuminate\Http\Response
     */
    public function edit(JadwalMekanik $jadwalMekanik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JadwalMekanik  $jadwalMekanik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JadwalMekanik $jadwalMekanik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JadwalMekanik  $jadwalMekanik
     * @return \Illuminate\Http\Response
     */
    public function destroy(JadwalMekanik $jadwalMekanik)
    {
        //
    }
}
