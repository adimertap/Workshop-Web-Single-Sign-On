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
        $pelayanan = PenerimaanService::with(
            'kendaraan',
            'customer_bengkel',
            'mekanik',
            'pitstop',
            'detail_sparepart.Merksparepart',
            'detail_sparepart.Jenissparepart',
            'detail_sparepart',
            'detail_perbaikan',
            'bengkel'
        )->find($id_service_advisor);

        return view('pages.service.pengerjaan_service.show', compact('pelayanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_service_advisor)
    {
        $service_advisor = PenerimaanService::with(
            'kendaraan',
            'customer_bengkel',
            'mekanik',
            'pitstop',
            'detail_sparepart.Merksparepart',
            'detail_sparepart.Jenissparepart',
            'detail_sparepart',
            'detail_perbaikan',
            'bengkel'
        )->find($id_service_advisor);
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



        $service->status =  'selesai_service';


        $service->update();

        return redirect()->back();
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
