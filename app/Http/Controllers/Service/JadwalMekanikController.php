<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Model\Kepegawaian\Absensi;
use App\Model\Kepegawaian\Jabatan;
use App\Model\Kepegawaian\Pegawai;
use App\Model\Service\JadwalMekanik;
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
        $mekanik = Jabatan::with('pegawai', 'pegawai.absensi_mekanik')->where('nama_jabatan', 'Mekanik')->get();
        // $absensi = Absensi::with(['pegawai.jabatan'])->get();
        // $mekanik = $absensi['pegawai']['jabatan']->where('nama_jabatan', 'Mekanik');
        $mekanik_asli = $mekanik[0]->pegawai;
        // return $mekanik_asli;
        return view('pages.service.jadwal_mekanik.main', compact('mekanik_asli'));
        // return view('pages.service.jadwal_mekanik.main');
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
