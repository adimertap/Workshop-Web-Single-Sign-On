<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Bank;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Marketplace\Keuangan;
use App\Model\Marketplace\Transaksi;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
   
        $penarikan = Keuangan::selectRaw('SUM(jumlah) as qt')->where('status', 'BERHASIL')
        ->groupBy('id_bengkel')->where('id_bengkel', Auth::user()->id_bengkel)->first();

        $penjualan = Transaksi::selectRaw('SUM(harga_total) as qt')->where('transaksi_status', 'DITERIMA')
        ->groupBy('id_bengkel')->where('id_bengkel', Auth::user()->id_bengkel)->first();
        $pengiriman = Transaksi::selectRaw('SUM(harga_pengiriman) as qt')->where('transaksi_status', 'DITERIMA')
        ->groupBy('id_bengkel')->where('id_bengkel', Auth::user()->id_bengkel)->first();


        // $keuangan_credit = Keuangan::get();
        if($penjualan){
            if($penarikan){
                $saldo = $penjualan->qt + $pengiriman->qt - $penarikan->qt;
            }else{
                $saldo = $penjualan->qt + $pengiriman->qt ;
            }
        }else{
            $saldo = 0;
        }
        $bank = Bank::get();

        $keuangan = Keuangan::where('id_bengkel', Auth::user()->id_bengkel)->orderBy('id_keuangan', 'DESC')->get();
        // $keuangan_debet = Keuangan::where('id_bengkel', Auth::user()->id_bengkel)->where('status', 'DEBET')->get();
        // $uang = $keuangan_debet - $keuangan_credit;

        // return $keuangan;
        return view('pages.adminmarketplace.keuangan',
            ['saldo' => $saldo, 
            'bank'=>$bank,
            'keuangan' => $keuangan]);        
    //    return view('pages.adminmarketplace.transaksi',[
    //        "transaksi" => $transaksi
    //    ]);
    }
    
    public function create(Request $request)
    {
        // dd($request->jawaban_faq);
       Keuangan::create([
            'id_bengkel'=> Auth::user()->id_bengkel,
            'jumlah'=> $request->jumlah,
            'nama_bank'=> $request->nama_bank,
            'no_rekening'=> $request->no_rekening,
            'nama_rekening'=> $request->nama_rekening,
        ]);

        
        return redirect()->back()->with('messageberhasil','Pengajuan Penarikan Saldo Berhasil');
    
    }
     public function destroy($id_keuangan)
    {
        $item = Keuangan::findOrFail($id_keuangan);
        $item->delete();

         return redirect()->route('keuangan')
            ->with('messageberhasil','Data Penarikan Berhasil DiHapus');
   
    }
}
