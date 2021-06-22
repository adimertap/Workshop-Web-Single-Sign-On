<?php

namespace App\Http\Controllers\FrontOffice;

use App\Model\FrontOffice\PenjualanSparepart;
use App\Http\Controllers\Controller;
use App\Model\FrontOffice\CustomerBengkel;
use App\Model\FrontOffice\DetailPenjualanSparepart;
use App\Model\Inventory\Kartugudang\Kartugudang;
use App\Model\Inventory\Sparepart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = PenjualanSparepart::with(['Customer'])->orderBy('id_penjualan_sparepart', 'DESC')->get();
        $blt = date('D, d/m/Y');
        return view('pages.frontoffice.penjualan_sparepart.main', compact('blt', 'penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = CustomerBengkel::all();
        $sparepart = Sparepart::where('stock', > 0)->get();
        $today = Carbon::today();

        $id = PenjualanSparepart::getId();
        foreach ($id as $value);
        $idlama = $value->id_penjualan_sparepart;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_penjualan_sparepart = 'PS-' . $blt . '/' . $idbaru;


        return view('pages.frontoffice.penjualan_sparepart.create', compact('customer', 'sparepart', 'kode_penjualan_sparepart', 'today'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = CustomerBengkel::where('nama_customer', $request->nama_customer)->first();

        $penjualan = new PenjualanSparepart;
        $penjualan->kode_penjualan = $request->kode_penjualan;
        $penjualan->id_customer_bengkel = $customer->id_customer_bengkel;
        $penjualan->tanggal = $request->tanggal;
        $penjualan->status_bayar = 'Belum Bayar';
        $penjualan->id_bengkel = Auth::user()->id_bengkel;

        $temp = 0;
        foreach ($request->sparepart as $key => $item) {
            $temp = $temp + $item['total_harga'];
            $sparepart = Sparepart::findOrFail($item['id_sparepart']);
            $sparepart->stock = $sparepart->stock - $item['jumlah'];
            if ($sparepart->stock >= $sparepart->stock_min) {
                $sparepart->status_jumlah = 'Cukup';
            } else if ($sparepart->stock == 0) {
                $sparepart->status_jumlah = 'Habis';
            } else {
                $sparepart->status_jumlah = 'Kurang';
            }
            $sparepart->save();

            $kartu_gudang = new Kartugudang;
            $kartu_gudang->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
            
            $kartugudangterakhir =  $sparepart->Kartugudangsaldoakhir;
            if($kartugudangterakhir != null)
            $kartu_gudang->saldo_akhir = $kartugudangterakhir->saldo_akhir - $item['jumlah'];

            if($kartugudangterakhir == null)
            $kartu_gudang->saldo_akhir =  $sparepart->stock - $item['jumlah'];

            $kartu_gudang->jumlah_keluar = $kartu_gudang->jumlah_keluar + $item['jumlah'];
            $kartu_gudang->id_sparepart = $sparepart->id_sparepart;
            $kartu_gudang->kode_transaksi = $penjualan->kode_penjualan;
            $kartu_gudang->tanggal_transaksi = $penjualan->tanggal;
            $kartu_gudang->jenis_kartu = 'Penjualan';
            $kartu_gudang->save();
        }
        $penjualan->total_bayar = $temp;

        $penjualan->save();
        $penjualan->Detailsparepart()->sync($request->sparepart);

        // return $request;
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PenjualanSparepart  $penjualanSparepart
     * @return \Illuminate\Http\Response
     */
    public function show($id_penjualan_sparepart)
    {
        $penjualan = PenjualanSparepart::with('Detailsparepart')->findOrFail($id_penjualan_sparepart);

        return view('pages.frontoffice.penjualan_sparepart.detail')->with([
            'penjualan' => $penjualan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PenjualanSparepart  $penjualanSparepart
     * @return \Illuminate\Http\Response
     */
    public function edit(PenjualanSparepart $penjualanSparepart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PenjualanSparepart  $penjualanSparepart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenjualanSparepart $penjualanSparepart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PenjualanSparepart  $penjualanSparepart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_penjualan_sparepart)
    {
        $penjualan = PenjualanSparepart::findOrFail($id_penjualan_sparepart);
        DetailPenjualanSparepart::where('id_penjualan_sparepart', $id_penjualan_sparepart)->delete();
        $penjualan->delete();

        return redirect()->back()->with('messagehapus', 'Data Penjualan Sparepart Berhasil dihapus');
    }
}
