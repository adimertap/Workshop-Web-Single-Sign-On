<?php

namespace App\Http\Controllers\Accounting\Payable;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\Jurnal\Jurnalpengeluaran;
use App\Model\Payroll\Gajipegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GajiAccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gajipegawai = Gajipegawai::groupBy('bulan_gaji','tahun_gaji','status_diterima','status_dana')->selectRaw('SUM(gaji_diterima) as total_gaji, bulan_gaji, COUNT(id_pegawai) as jumlah_pegawai, SUM(total_tunjangan) as total_tunjangan, tahun_gaji, status_diterima, status_dana')->get();

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        $jenis_transaksi = Jenistransaksi::all();
        return view('pages.accounting.payable.gajiaccounting.gajiaccounting', compact('today','tanggal','gajipegawai','jenis_transaksi'));
    }

    public function postingjurnal(Request $request){

        $gajipegawai = Gajipegawai::groupBy('bulan_gaji','tahun_gaji','status_diterima','status_dana','id_jenis_transaksi')->selectRaw('SUM(gaji_diterima) as total_gaji, bulan_gaji, COUNT(id_pegawai) as jumlah_pegawai, SUM(total_tunjangan) as total_tunjangan, tahun_gaji, status_diterima, status_dana, id_jenis_transaksi')
        ->where('bulan_gaji', $request->bulan_gaji)->where('tahun_gaji', $request->tahun_gaji)->first();

        $jurnal = new Jurnalpengeluaran;
        $jurnal->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        $jurnal->tanggal_jurnal = Carbon::now();
        $jurnal->ref = $gajipegawai->bulan_gaji;
        $jurnal->keterangan = $gajipegawai->bulan_gaji;
        $jurnal->grand_total = $gajipegawai->total_gaji;
        $jurnal->id_jenis_transaksi = $gajipegawai->id_jenis_transaksi;
        $jurnal->jenis_jurnal = 'Gaji_Karyawan';
        $jurnal->save();
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
