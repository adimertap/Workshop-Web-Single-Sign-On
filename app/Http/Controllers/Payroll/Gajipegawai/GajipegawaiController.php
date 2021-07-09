<?php

namespace App\Http\Controllers\Payroll\Gajipegawai;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Inventory\Retur\Retur;
use App\Model\Kepegawaian\Jabatan;
use App\Model\Kepegawaian\Pegawai;
use App\Model\Payroll\Detailgaji;
use App\Model\Payroll\Detailpegawai;
use App\Model\Payroll\Detailtunjangan;
use App\Model\Payroll\Gajipegawai;
use App\Model\Payroll\Mastertunjangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class GajipegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $gaji = Gajipegawai::with([
            'Detailpegawai','Jenistransaksi'
        ])->get();

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');
        $jenis_transaksi = Jenistransaksi::all();
        $tahun_bayar = Carbon::now()->format('Y');
        // $pegawai = Pegawai::with([
        //     'Jabatan.Gajipokok'
        // ])->join('tb_kepeg_master_jabatan', 'tb_kepeg_master_pegawai.id_jabatan', 'tb_kepeg_master_jabatan.id_jabatan')
        // ->where('nama_jabatan', '!=', 'Owner')->get();
       

        return view('pages.payroll.gajipegawai.revisigajipegawai', compact('gaji','tahun_bayar','today','tanggal','jenis_transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.payroll.gajipegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pegawai = Pegawai::where('nama_pegawai',$request->nama_pegawai)->first();
        // $id_pegawai = $pegawai->id_pegawai;
        $data = Gajipegawai::where('id_bengkel', Auth::user()->id_bengkel)->where('tahun_gaji', $request->tahun_gaji)
        ->where('bulan_gaji', $request->bulan_gaji)->first();

        if (empty($data)){

            $gaji = Gajipegawai::create([
                'bulan_gaji'=>$request->bulan_gaji,
                'tahun_gaji'=>$request->tahun_gaji,
                'id_bengkel' => $request['id_bengkel'] = Auth::user()->id_bengkel,
                'id_jenis_transaksi' => $request->id_jenis_transaksi
            ]); 
            
            return $gaji;
        }else{
            throw new \Exception('Gaji Sudah Ada');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_gaji_pegawai)
    {
        $gaji = Gajipegawai::with('Detailpegawai.Detailtunjangan')->findOrFail($id_gaji_pegawai);
        // $gaji2 = Gajipegawai::with('Detailtunjangan')->findOrFail($id_gaji_pegawai);
        // return $gaji;    

        return view('pages.payroll.gajipegawai.detail')->with([
            'gaji' => $gaji,
            'jumlah_pegawai' => Detailgaji::where('id_gaji_pegawai', $id_gaji_pegawai)->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gaji = Gajipegawai::with([
            // 'Pegawai','Pegawai.Jabatan.Gajipokok','Pegawai.absensi','Detailtunjangan'
            'Detailpegawai','Jenistransaksi'
        ])->find($id);

       
        $jenis_transaksi = Jenistransaksi::all();
        $pegawai = Pegawai::with([
            'Jabatan.Gajipokok'
        ])->join('tb_kepeg_master_jabatan', 'tb_kepeg_master_pegawai.id_jabatan', 'tb_kepeg_master_jabatan.id_jabatan')
        ->where('nama_jabatan', '!=', 'Owner')->get();

        $jabatan = Jabatan::all();
        $tunjangan = Mastertunjangan::all();
        $today = Carbon::now()->format('D, d/m/Y');

        return view('pages.payroll.gajipegawai.revisicreate',['gaji_total' => Gajipegawai::sum('grand_total_gaji')], compact('gaji','pegawai','tunjangan','today','jenis_transaksi','jabatan'));
    }

    public function edit2(Request $request, $id_gaji_pegawai)
    {
        $gaji = Gajipegawai::with([
            'Pegawai','Pegawai.Jabatan.Gajipokok','Pegawai.absensi','Detailtunjangan'
        ])->find($id_gaji_pegawai);

        $jenis_transaksi = Jenistransaksi::all();
        $seluruhpegawai = Pegawai::all();
        $tunjangan = Mastertunjangan::all();
        $today = Carbon::now()->format('D, d/m/Y');

        return view('pages.payroll.gajipegawai.edit',['gaji_total' => Gajipegawai::sum('gaji_diterima')], compact('gaji','seluruhpegawai','tunjangan','today','jenis_transaksi'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_gaji_pegawai)
    {
        $gaji = Gajipegawai::findOrFail($id_gaji_pegawai);
        $gaji->tahun_gaji = $request->tahun_gaji;
        $gaji->bulan_gaji = $request->bulan_gaji;
        $gaji->grand_total_gaji = $request->grand_total_gaji;
        $gaji->grand_total_tunjangan = $request->grand_total_tunjangan;
        $gaji->grand_total_pph21 = $request->grand_total_pph21;
        $gaji->keterangan = $request->keterangan;
        $gaji->id_jenis_transaksi = $request->id_jenis_transaksi;
        $gaji->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        
        $gaji->save();
        $gaji->Detailpegawai()->sync($request->pegawai);
        $gaji->Detailtunjangan()->sync($request->tunjangan);

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_gaji_pegawai)
    {
        $gaji = Gajipegawai::findOrFail($id_gaji_pegawai);
        Detailgaji::where('id_gaji_pegawai', $id_gaji_pegawai)->delete();
        Detailtunjangan::where('id_gaji_pegawai', $id_gaji_pegawai)->delete();
        $gaji->delete();

        return redirect()->back()->with('messagehapus','Data Pembayaran Gaji Pegawai Berhasil dihapus');
    }

    public function setStatus(Request $request, $id_gaji_pegawai)
    {
        $request->validate([
            'status' => 'required|in:Belum Dibayarkan,Dibayarkan'
        ]);

        $item = Gajipegawai::findOrFail($id_gaji_pegawai);
        $item->status_diterima = $request->status;

        $item->save();
        return redirect()->route('gaji-pegawai.index')->with('messagebayar','Slip Gaji Pegawai berhasil Dibayarkan');
    }

    public function setStatusPerBulanTahun($id_gaji_pegawai)
    {
        $item = Gajipegawai::find($id_gaji_pegawai);
        $item->status_dana = 'Dana Telah Diberikan';
        $item->save();

        return redirect()->back()->with('messagebayar','Proses Pencairan Dana Berhasil Dilakukan');
    }

    public function CetakSlip($id_gaji_pegawai)
    {
        $gaji = Gajipegawai::with('Pegawai','Pegawai.Jabatan.Gajipokok','Pegawai.absensi','Detailtunjangan')
        ->findOrFail($id_gaji_pegawai);
        
        $now = Carbon::now();
        return view('print.Payroll.cetakslip', compact('gaji','now'));
    }
}
