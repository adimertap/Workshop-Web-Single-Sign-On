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
use App\Model\Service\Reservasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerimaanServiceController extends Controller
{

    public function reservasi(Request $request)
    {
        $reservasi = Reservasi::where('kode_reservasi', $request->kode_reservasi)->first();
        return json_encode($reservasi);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_advisor = PenerimaanService::all();
        $kendaraan = MasterDataKendaraan::all();
        $customer_bengkel = CustomerBengkel::all();
        $sparepart = Sparepart::all();
        $pegawai = Pegawai::all();
        $jasa_perbaikan = MasterDataJenisPerbaikan::all();
        $date = Carbon::today()->toDateString();

        $id = PenerimaanService::getId();
        foreach ($id as $value);
        $idlama = $value->id_service_advisor;
        $idbaru = $idlama + 1;
        $blt = date('m');
        $kode_sa = 'SPK-' . $blt . '/' . $idbaru;

        $mekanik = Jabatan::with('pegawai.absensi_mekanik')->where('nama_jabatan', 'Mekanik')->get();
        $mekanik_asli = $mekanik[0]->pegawai;

        return view('pages.service.penerimaan_service.main', compact('service_advisor', 'kode_sa', 'kendaraan', 'idbaru', 'customer_bengkel', 'pegawai', 'sparepart', 'jasa_perbaikan', 'mekanik_asli', 'date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service_advisor = PenerimaanService::all();
        $kendaraan = MasterDataKendaraan::all();
        $customer_bengkel = CustomerBengkel::all();
        $sparepart = Sparepart::all();
        $pegawai = Pegawai::all();
        $jasa_perbaikan = MasterDataJenisPerbaikan::all();
        $date = Carbon::today()->toDateString();

        $id = PenerimaanService::getId();
        foreach ($id as $value);
        $idlama = $value->id_service_advisor;
        $idbaru = $idlama + 1;
        $blt = date('m');
        $kode_sa = 'SPK-' . $blt . '/' . $idbaru;

        $mekanik = Jabatan::with('pegawai.absensi_mekanik')->where('nama_jabatan', 'Mekanik')->get();
        $mekanik_asli = $mekanik[0]->pegawai;

        return view('pages.service.penerimaan_service.create-booking', compact('service_advisor', 'kode_sa', 'kendaraan', 'idbaru', 'customer_bengkel', 'pegawai', 'sparepart', 'jasa_perbaikan', 'mekanik_asli', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reservasi = Reservasi::where('kode_reservasi', $request->kode_reservasi)->first();
        $reservasi->status = 'BERHASIL';
        $reservasi->save();


        $service = new PenerimaanService;
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
        $service->status =  'menunggu';
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

            $kartu_gudang = new Kartugudang;
            $kartu_gudang->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
            $kartu_gudang->saldo_akhir =  $sparepart->stock;
            $kartu_gudang->jumlah_keluar = $kartu_gudang->jumlah_keluar + $item1['jumlah'];
            $kartu_gudang->id_sparepart = $sparepart->id_sparepart;
            $kartu_gudang->kode_transaksi = $service->kode_sa;
            $kartu_gudang->tanggal_transaksi = $service->date;
            $kartu_gudang->jenis_kartu = 'Service';
            $kartu_gudang->save();
        }

        $temp2 = 0;
        foreach ($request->jasa_perbaikan as $key => $item2) {
            $temp2 = $temp2 + $item2['total_harga'];
        }

        $service->total_bayar = $temp1 + $temp2;


        $service->save();
        $service->detail_sparepart()->sync($request->sparepart);
        $service->detail_perbaikan()->sync($request->jasa_perbaikan);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PenerimaanService  $penerimaanService
     * @return \Illuminate\Http\Response
     */
    public function show(PenerimaanService $penerimaanService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PenerimaanService  $penerimaanService
     * @return \Illuminate\Http\Response
     */
    public function edit(PenerimaanService $penerimaanService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PenerimaanService  $penerimaanService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenerimaanService $penerimaanService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PenerimaanService  $penerimaanService
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenerimaanService $penerimaanService)
    {
        //
    }
}
