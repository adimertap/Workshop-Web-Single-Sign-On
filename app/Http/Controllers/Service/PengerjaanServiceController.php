<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Model\FrontOffice\CustomerBengkel;
use App\Model\FrontOffice\MasterDataJenisPerbaikan;
use App\Model\FrontOffice\MasterDataKendaraan;
use App\Model\Inventory\Kartugudang\Kartugudang;
use App\Model\Inventory\Sparepart;
use App\Model\Kepegawaian\Jabatan;
use App\Model\Kepegawaian\Pegawai;
use App\Model\Service\PenerimaanService;
use App\Model\Service\PengerjaanService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengerjaanServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengerjaan = PenerimaanService::with(['customer_bengkel', 'kendaraan', 'pegawai', 'mekanik', 'pitstop'])->orderBy('id_service_advisor', 'DESC')->get();
        // return $pengerjaan;
        return view('pages.service.pengerjaan_service.main', compact('pengerjaan'));
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
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function show($id_service_advisor)
    {
        $pelayanan = PenerimaanService::with('kendaraan', 'customer_bengkel', 'mekanik','pitstop', 'detail_sparepart.Merksparepart','detail_sparepart.Jenissparepart',
        'detail_sparepart', 'detail_perbaikan', 'bengkel')->find($id_service_advisor);

        return view('pages.service.pengerjaan_service.show',compact('pelayanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_service_advisor)
    {
        $service_advisor = PenerimaanService::with('kendaraan', 'customer_bengkel', 'mekanik','pitstop', 'detail_sparepart.Merksparepart','detail_sparepart.Jenissparepart',
        'detail_sparepart', 'detail_perbaikan', 'bengkel')->find($id_service_advisor);
        $kendaraan = MasterDataKendaraan::all();
        $customer_bengkel = CustomerBengkel::all();
        $sparepart = Sparepart::with('Kartugudangpenjualan')->where('stock', '>', 0)->get();
        $pegawai = Pegawai::all();
        $jasa_perbaikan = MasterDataJenisPerbaikan::all();
        $date = Carbon::today()->toDateString();

        $mekanik = Jabatan::with('pegawai.absensi_mekanik')->where('nama_jabatan', 'Mekanik')->get();
        $mekanik_asli = $mekanik[0]->pegawai;

        return view('pages.service.pengerjaan_service.edit', compact('service_advisor', 'kode_sa', 'kendaraan', 'idbaru', 'customer_bengkel', 'pegawai', 'sparepart', 'jasa_perbaikan', 'mekanik_asli', 'date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_service_advisor)
    {
        $service = PenerimaanService::find($id_service_advisor);
        $service->id_pegawai = $request['id_pegawai'] = Auth::user()->pegawai->id_pegawai;
        $service->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;

        $service->kode_sa = $request->kode_sa;
        $service->id_customer_bengkel = $request->id_customer_bengkel;
        $service->id_kendaraan = $request->id_kendaraan;
        $service->odo_meter =  $request->odo_meter;
        $service->date =  $request->date;
        $service->plat_kendaraan =  $request->plat_kendaraan;
        $service->keluhan_kendaraan =  $request->keluhan_kendaraan;
        $service->id_mekanik =  $request->id_mekanik;
        $service->status =  'dikerjakan';
        $service->waktu_estimasi =  $request->waktu_estimasi;

        $temp1 = 0;
        foreach ($request->sparepart as $key => $item1) {
            $temp1 = $temp1 + $item1['total_harga'];
            $sparepart = Sparepart::findOrFail($item1['id_sparepart']);
            $sparepart->stock = $sparepart->stock - $item1['jumlah'];

            if ($sparepart->stock >= $sparepart->stock_min) {
                $sparepart->status_jumlah = 'Cukup';
            } else if ($sparepart->stock == 0) {
                $sparepart->status_jumlah = 'Habis';
            } else {
                $sparepart->status_jumlah = 'Kurang';
            }
            $sparepart->save();

            // $kartu_gudang = new Kartugudang;
            // $kartu_gudang->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;

            // $kartugudangterakhir =  $sparepart->Kartugudangsaldoakhir;
            // if ($kartugudangterakhir != null)
            //     $kartu_gudang->saldo_akhir = $kartugudangterakhir->saldo_akhir - $item1['jumlah'];

            // if ($kartugudangterakhir == null)
            //     $kartu_gudang->saldo_akhir = $item1['jumlah'];

            // $kartu_gudang->jumlah_keluar = $kartu_gudang->jumlah_keluar + $item1['jumlah'];
            // $kartu_gudang->harga_beli = $kartu_gudang->harga + $item1['harga'];
            // $kartu_gudang->id_sparepart = $sparepart->id_sparepart;
            // $kartu_gudang->kode_transaksi = $service->kode_sa;
            // $kartu_gudang->tanggal_transaksi = $service->date;
            // $kartu_gudang->jenis_kartu = 'Penjualan';
            // $kartu_gudang->save();
        }

        $temp2 = 0;
        foreach ($request->jasa_perbaikan as $key => $item2) {
            $temp2 = $temp2 + $item2['total_harga'];
        }

        $service->total_bayar = $temp1 + $temp2;


        $service->update();
        $service->detail_sparepart()->sync($request->sparepart);
        $service->detail_perbaikan()->sync($request->jasa_perbaikan);

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengerjaanService $pengerjaanService)
    {
        //
    }
}
