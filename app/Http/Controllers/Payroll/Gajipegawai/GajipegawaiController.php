<?php

namespace App\Http\Controllers\Payroll\Gajipegawai;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Retur\Retur;
use App\Model\Kepegawaian\Pegawai;
use App\Model\Payroll\Gajipegawai;
use App\Model\Payroll\Mastertunjangan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GajipegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $gaji = Gajipegawai::with([
            'Pegawai'
        ])->get();


        $tahun_bayar = Carbon::now()->format('Y');
        $pegawai = Pegawai::with([
            'Jabatan.Gajipokok'
        ])->get();
       

        return view('pages.payroll.gajipegawai.gajipegawai', compact('gaji','pegawai','tahun_bayar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.payroll.gajipegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = Pegawai::where('nama_pegawai',$request->nama_pegawai)->first();
        $id_pegawai = $pegawai->id_pegawai;

        $gaji = Gajipegawai::create([
            'id_pegawai'=>$id_pegawai,
            'bulan_gaji'=>$request->bulan_gaji,
            'tahun_gaji'=>$request->tahun_gaji,
        ]);
        
        return $gaji;
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
        $gaji = Gajipegawai::with([
            'Pegawai','Pegawai.Jabatan.Gajipokok',
        ])->find($id);

        $seluruhpegawai = Pegawai::all();
        $tunjangan = Mastertunjangan::all();
        $today = Carbon::now()->format('D, d/m/Y');

        return view('pages.payroll.gajipegawai.create', compact('gaji','seluruhpegawai','tunjangan','today'));
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
