<?php

namespace App\Http\Controllers\Accounting\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounting\Jenistransaksirequest;
use App\Model\Accounting\Akun;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\PenentuanAkun;
use App\Model\Inventory\Retur\Retur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterdatajenistransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_transaksi = Jenistransaksi::with('DetailPenentuanAkun','PenentuanAkun.Akun','PenentuanAkun.PasanganAkun')->get();
        // return $jenis_transaksi;
        // return $jenis_transaksi;
        $akun = Akun::all();
     
        return view('pages.accounting.masterdata.jenistransaksi', compact('jenis_transaksi','akun'));
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
    public function store(Jenistransaksirequest $request)
    {
        $jenis_transaksi = new Jenistransaksi;
        $jenis_transaksi->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        $jenis_transaksi->nama_transaksi = $request->nama_transaksi;
        
        // $rak=Rak::all()

        $jenis_transaksi->save();
        return redirect()->back()->with('messageberhasil','Data Jenis Transaksi Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_jenis_transaksi)
    {
        $jenis_transaksi = Jenistransaksi::with('PenentuanAkun.Akun','PenentuanAkun.PasanganAkun')->find($id_jenis_transaksi);
        $akun = Akun::all();
      
        return view('pages.accounting.masterdata.detail_jenis_transaksi', compact('jenis_transaksi','akun'));
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
    public function update(Jenistransaksirequest $request, $id_jenis_transaksi)
    {
        $jenis_transaksi = Jenistransaksi::findOrFail($id_jenis_transaksi);
        $jenis_transaksi->nama_transaksi = $request->nama_transaksi;
        
        $jenis_transaksi->update();
        return redirect()->back()->with('messageberhasil','Data Jenis Transaksi Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis_transaksi)
    {
        $jenis_transaksi = Jenistransaksi::findOrFail($id_jenis_transaksi);
        PenentuanAkun::where('id_jenis_transaksi', $id_jenis_transaksi)->delete();
        $jenis_transaksi->delete();

        return redirect()->back()->with('messagehapus','Data Jenis Transaksi Berhasil dihapus');
    }

}
