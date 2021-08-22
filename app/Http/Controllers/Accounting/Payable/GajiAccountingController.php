<?php

namespace App\Http\Controllers\Accounting\Payable;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\Jurnal\Jurnalpengeluaran;
use App\Model\Payroll\Detailgaji;
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
        // $gajipegawai = Gajipegawai::groupBy('bulan_gaji','tahun_gaji','status_dana','status_jurnal')->selectRaw('SUM(gaji_diterima) as total_gaji, bulan_gaji, COUNT(id_pegawai) as jumlah_pegawai, SUM(total_tunjangan) as total_tunjangan, tahun_gaji, status_dana, status_jurnal')->get();

        $gajipegawai = Gajipegawai::with('Detailpegawai.Detailtunjangan','Detailpegawai')->get();

 

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        $jenis_transaksi = Jenistransaksi::all();
        return view('pages.accounting.payable.gajiaccounting.gajiaccounting')-> 
        with([
            'today' => $today,
            'tanggal' => $tanggal,
            'gajipegawai' => $gajipegawai,
            'jenis_transaksi' => $jenis_transaksi,
        ]);
        
        
    }

    public function setStatusPerBulanTahun($id_gaji_pegawai)
    {
        $item = Gajipegawai::find($id_gaji_pegawai);
        $item->status_dana = 'Dana Telah Diberikan';
        $item->save();

        return redirect()->back()->with('messagebayar','Proses Pencairan Dana Berhasil Dilakukan');
    }

    public function postingjurnal( $id_gaji_pegawai){

        $gajipegawai = Gajipegawai::find($id_gaji_pegawai);

        $jurnal = new Jurnalpengeluaran;
        $jurnal->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        $jurnal->tanggal_jurnal = Carbon::now();
        $jurnal->tanggal_transaksi = $gajipegawai->updated_at;
        $jurnal->kode_transaksi = $gajipegawai->bulan_gaji;
        $jurnal->ref = $gajipegawai->bulan_gaji;
        $jurnal->keterangan = $gajipegawai->bulan_gaji;
        $jurnal->grand_total = $gajipegawai->grand_total_gaji;
        $jurnal->id_jenis_transaksi = $gajipegawai->id_jenis_transaksi;
        $jurnal->jenis_jurnal = 'Gaji_Karyawan';
        $jurnal->save();


        $gajipegawai->status_jurnal = 'Sudah Diposting';
        $gajipegawai->save();

        return redirect()->back()->with('messagejurnal','Data Penggajian Pegawai Berhasil diposting');;
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
    public function show($id_gaji_pegawai)
    {
        $gaji = Gajipegawai::with('Detailpegawai.Detailtunjangan')->findOrFail($id_gaji_pegawai);
        // $gaji2 = Gajipegawai::with('Detailtunjangan')->findOrFail($id_gaji_pegawai);
        // return $gaji;    

        return view('pages.accounting.payable.gajiaccounting.detail')->with([
            'gaji' => $gaji,
            'jumlah_pegawai' => Detailgaji::where('id_gaji_pegawai', $id_gaji_pegawai)->count(),
        ]);
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
