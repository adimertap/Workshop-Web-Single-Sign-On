<?php

namespace App\Http\Controllers\Accounting\Payable;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\Payable\Pajak;
use App\Model\Accounting\Payable\Pajakdetail;
use App\Model\Accounting\Payable\Pembayaranpajak;
use App\Model\Kepegawaian\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pajak = Pajak::with([
            'Pegawai','Jenistransaksi'
        ])->get();

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('pages.accounting.payable.pajak.pajak', compact('pajak','today','tanggal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pajak = Pajak::with([
            'detailpajak',
        ])->get();

        $jenis_transaksi = Jenistransaksi::all();
        $pegawai = Pegawai::all();
    

        $id = Pajak::getId();
        foreach($id as $value);
        $idlama = $value->id_pajak;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_pajak = 'PJK-'.$blt.'/'.$idbaru;
        $id_pajak = $idbaru;

        return view('pages.accounting.payable.pajak.create', compact('id_pajak','jenis_transaksi','pegawai','kode_pajak','pajak')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = Pajak::getId();
        foreach($id as $value);
        $idlama = $value->id_pajak;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_pajak = 'PJK-'.$blt.'/'.$idbaru;

        $pajak = new Pajak;
        $pajak->kode_pajak = $kode_pajak;
        $pajak->id_jenis_transaksi = $request->id_jenis_transaksi;
        $pajak->id_pegawai = $request['id_pegawai'] = Auth::user()->pegawai->id_pegawai;
        $pajak->tanggal_bayar = $request->tanggal_bayar;
        $pajak->deskripsi_pajak = $request->deskripsi_pajak;
        $pajak->total_pajak = $request->total_pajak;
        $pajak->status_jurnal = 'Belum Diposting';
        $pajak->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;

        $pajak->save();
        
        $pajak->detailpajak()->insert($request->pajak);
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pajak)
    {
        $pajak = Pajak::with('detailpajak')->findOrFail($id_pajak);

        return view('pages.accounting.payable.pajak.detail')->with([
            'pajak' => $pajak
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pajak)
    {
        $pajak = Pajak::with([
            'detailpajak', 'Jenistransaksi'
        ])->findOrFail($id_pajak);

        // return $pajak;

        $jenis_transaksi = Jenistransaksi::all();

        return view('pages.accounting.payable.pajak.edit', compact('jenis_transaksi','pajak','id_pajak')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pajak)
    {
        $pajak = Pajak::find($id_pajak);
        $pajak->id_jenis_transaksi = $request->id_jenis_transaksi;
        $pajak->tanggal_bayar = $request->tanggal_bayar;
        $pajak->deskripsi_pajak = $request->deskripsi_pajak;
        $pajak->total_pajak = $request->total_pajak;
        $pajak->update();
        
        $pajak->detailpajak()->delete();

        $pajak->detailpajak()->insert($request->pajak);
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pajak)
    {
        $pajak = Pajak::findOrFail($id_pajak);
        
        Pajakdetail::where('id_pajak', $id_pajak)->delete();
        $pajak->delete();

        return redirect()->back()->with('messagehapus','Data Pajak Berhasil dihapus');
    }
}
