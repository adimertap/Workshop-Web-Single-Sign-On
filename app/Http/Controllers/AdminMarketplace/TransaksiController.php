<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
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
            }
        }
        $transaksi->update();
                return redirect()->back()->with('messageberhasil','Data Resi Berhasil Ditambahkan');

        
    
    }
}
