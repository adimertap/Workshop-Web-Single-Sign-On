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
        $transaksi = Transaksi::with('User', 'Detailtransaksi', 'Kabupaten.Provinsi')->where('id_bengkel', Auth::user()->id_bengkel)->where('transaksi_status', 'DIBAYAR')->orwhere('transaksi_status', 'DIKIRIM')->orwhere('transaksi_status', 'DITERIMA')->get();
    //    dd($transaksi);

        
       return view('pages.adminmarketplace.transaksi',[
           "transaksi" => $transaksi,
       ]);
    }
    public function update(Request $request, $id)
    {

        $transaksi= Transaksi::findOrFail($id);
        $transaksi->resi= $request->resi;
        if($request->transaksi_status == "DIBAYAR"){
            $transaksi->transaksi_status = "DIKIRIM";

            $detailtransaksi=DetailTransaksi::where('id_transaksi_online', $id)->get();
            foreach($detailtransaksi as $item){
                $sparepart= Sparepart::findOrFail($item->id_sparepart);
                $sparepart->stock = $sparepart->stock - $item->jumlah_produk;
                if($sparepart->stock >= $sparepart->stock_min){
                    $sparepart->status_jumlah = 'Cukup';
                } else if($sparepart->stock == 0){
                    $sparepart->status_jumlah = 'Habis';
                }else{
                    $sparepart->status_jumlah ='Kurang';
                }
                $sparepart->save();

                $kartu_gudang = new Kartugudang;
                $kartu_gudang->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
                $kartu_gudang->jumlah_keluar = $item->jumlah_produk;
                $kartu_gudang->saldo_akhir =  $sparepart->stock - $item->jumlah_produk;
                $kartu_gudang->id_sparepart = $sparepart->id_sparepart;
                $kartu_gudang->kode_transaksi = $transaksi->code_transaksi;
                $kartu_gudang->tanggal_transaksi = $transaksi->created_at;
                $kartu_gudang->jenis_kartu = 'Online';
                $kartu_gudang->save();
            }
        }
        $transaksi->update();
        
        return redirect()->back()->with('messageberhasil','Data Akun Berhasil ditambahkan');
    }
}
