<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Kartugudang\Kartugudang;
use App\Model\Inventory\Sparepart;
use App\Model\Marketplace\DetailTransaksi;
use Illuminate\Support\Facades\Auth;

use App\Model\Marketplace\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('User', 'Detailtransaksi', 'Kabupaten.Provinsi')->where('id_bengkel', Auth::user()->id_bengkel)->get();
    //    dd($transaksi);

        
       return view('pages.adminmarketplace.transaksi',[
           "transaksi" => $transaksi,
       ]);
    }
    public function update(Request $request, $id)
    {

        $transaksi= Transaksi::findOrFail($id);
        $transaksi->resi= $request->resi;
        if($request->transaksi_status == "PENDING"){
            $transaksi->transaksi_status = "DIKIRIM";

            $detailtransaksi=DetailTransaksi::where('id_transaksi_online', $id)->get();
            foreach($detailtransaksi as $item){
                $sparepart= Sparepart::findOrFail($item->id_sparepart);
                $sparepart->stock = $sparepart->stock - $item->jumlah_produk;
                $sparepart->save();

                $kartu_gudang = new Kartugudang;
                $kartu_gudang->jumlah_keluar = $item->jumlah_produk - $kartu_gudang->jumlah_masuk;
                $kartu_gudang->id_sparepart = $sparepart->id_sparepart;
                $kartu_gudang->id_transaksi_online = $transaksi->id_transaksi_online;
                $kartu_gudang->tanggal_transaksi = $transaksi->created_at;
                $kartu_gudang->jenis_kartu = 'Online';
                $kartu_gudang->save();
            }
        }
        $transaksi->update();
        
       return $transaksi;
    }
}
