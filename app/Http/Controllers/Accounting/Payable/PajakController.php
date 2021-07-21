<?php

namespace App\Http\Controllers\Accounting\Payable;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\Payable\Pajak;
use App\Model\Accounting\Payable\Pajakdetail;
use App\Model\Accounting\Payable\Pembayaranpajak;
use App\Model\Kepegawaian\Pegawai;
use App\Model\Payroll\Gajipegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pajak = Pajak::with([
            'Pegawai','Jenistransaksi'
        ])->get();

        $jenis_transaksi = Jenistransaksi::all();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');
        $gaji = Gajipegawai::with('Detailpegawai')->where('grand_total_pph21','>',0)->where('status_pajak','=','Belum Dibayar')->get();
        // return $gaji;

        $id = Pajak::getId();
        foreach($id as $value);
        $idlama = $value->id_pajak;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_pajak = 'PJK-'.$blt.'/'.$idbaru;

        return view('pages.accounting.payable.pajak.pajak', compact('pajak','today','tanggal','jenis_transaksi','kode_pajak','gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pajak = Pajak::with([
            'detailpajak',
        ])->get();
        $jenis_transaksi = Jenistransaksi::all();
        $gaji = Gajipegawai::with('Detailpegawai')->get();

        return view('pages.accounting.payable.pajak.create', compact('jenis_transaksi','pajak','gaji')); 
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->status_pajak == 'Terkait Pegawai'){
            $gaji = Gajipegawai::where('bulan_gaji',$request->bulan_gaji)->where('tahun_gaji', $request->tahun_gaji)->first();
            $id_gaji_pegawai = $gaji->id_gaji_pegawai;
          
            $pajak = Pajak::create([
                'id_gaji_pegawai'=>$id_gaji_pegawai,
                'kode_pajak'=>$request->kode_pajak,
                'id_jenis_transaksi'=>$request->id_jenis_transaksi,
                'id_bengkel' => $request['id_bengkel'] = Auth::user()->id_bengkel,
                'id_pegawai' => $request['id_pegawai'] = Auth::user()->Pegawai->id_pegawai,
                'status_pajak' => $request->status_pajak
            ]);
            
            return $pajak;

        }else if($request->status_pajak == 'Tidak Terkait'){
            
            $pajak = Pajak::create([
                'kode_pajak'=>$request->kode_pajak,
                'id_jenis_transaksi'=>$request->id_jenis_transaksi,
                'id_bengkel' => $request['id_bengkel'] = Auth::user()->id_bengkel,
                'id_pegawai' => $request['id_pegawai'] = Auth::user()->Pegawai->id_pegawai,
                'status_pajak' => $request->status_pajak
            ]);
            
            return $pajak;

        }

       

        // $id = Pajak::getId();
        // foreach($id as $value);
        // $idlama = $value->id_pajak;
        // $idbaru = $idlama + 1;
        // $blt = date('m');

        // $kode_pajak = 'PJK-'.$blt.'/'.$idbaru;

        // $pajak = new Pajak;
        // $pajak->kode_pajak = $kode_pajak;
        // $pajak->id_jenis_transaksi = $request->id_jenis_transaksi;
        // $pajak->id_pegawai = $request['id_pegawai'] = Auth::user()->pegawai->id_pegawai;
        // $pajak->tanggal_bayar = $request->tanggal_bayar;
        // $pajak->deskripsi_pajak = $request->deskripsi_pajak;
        // $pajak->total_pajak = $request->total_pajak;
        // $pajak->status_jurnal = 'Belum Diposting';
        // $pajak->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;

        // $pajak->save();
        
        // $pajak->detailpajak()->insert($request->pajak);
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pajak)
    {
        $pajak = Pajak::with('detailpajak','gaji','gaji.jenistransaksi')->findOrFail($id_pajak);

        return view('pages.accounting.payable.pajak.detail')->with([
            'pajak' => $pajak
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pajak)
    {
        $pajak = Pajak::with([
            'Detailpajak','Jenistransaksi','Gaji','Gaji.Jenistransaksi'
        ])->find($id_pajak);

        if($pajak->status_pajak == 'Terkait Pegawai'){

            $jenis_transaksi = Jenistransaksi::all();

            return view('pages.accounting.payable.pajak.pajakgaji', compact('jenis_transaksi','pajak','id_pajak')); 
       
        }elseif($pajak->status_pajak == 'Tidak Terkait'){
            $jenis_transaksi = Jenistransaksi::all();

            return view('pages.accounting.payable.pajak.edit', compact('jenis_transaksi','pajak','id_pajak')); 
        }
    }

    public function editpajak($id_pajak)
    {
        $pajak = Pajak::with([
            'Jenistransaksi','Gaji','Gaji.Jenistransaksi'
        ])->find($id_pajak);

        return $pajak;
        // if($pajak->status_pajak == 'Terkait Pegawai'){

        //     $jenis_transaksi = Jenistransaksi::all();

        //     return view('pages.accounting.payable.pajak.pajakgaji', compact('jenis_transaksi','pajak','id_pajak')); 
        // }elseif($pajak->status_pajak == 'Tidak Terkait'){
        //     $jenis_transaksi = Jenistransaksi::all();

        //     return view('pages.accounting.payable.pajak.edit', compact('jenis_transaksi','pajak','id_pajak')); 
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pajak)
    {
        $pajak = Pajak::find($id_pajak);
        $pajak->id_jenis_transaksi = $request->id_jenis_transaksi;
        $pajak->tanggal_bayar = $request->tanggal_bayar;
        $pajak->deskripsi_pajak = $request->deskripsi_pajak;
        $pajak->total_pajak = $request->total_pajak;
        $pajak->update();
        
        $pajak->detailpajak()->delete();

        $pajak->detailpajak()->insert($request->pajak);
        return $request;
    }

    public function pajakpegawai(Request $request, $id_pajak)
    {
        $gaji = Gajipegawai::where('bulan_gaji',$request->bulan_gaji)->where('tahun_gaji', $request->tahun_gaji)->first();

        $pajak = Pajak::find($id_pajak);
        $pajak->id_jenis_transaksi = $request->id_jenis_transaksi;
        $pajak->tanggal_bayar = $request->tanggal_bayar;
        $pajak->deskripsi_pajak = $request->deskripsi_pajak;
        $pajak->total_pajak = $request->total_pajak;
        $pajak->update();

        $gaji->status_pajak = 'Sudah Dibayar';
        $gaji->save();
        

        return redirect()->route('pajak.index')->with('messageberhasil','Berhasil Menambahkan Pajak Terkait Pegawai');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pajak)
    {
        $pajak = Pajak::findOrFail($id_pajak);

        if($pajak->status_pajak == 'Tidak Terkait'){
            Pajakdetail::where('id_pajak', $id_pajak)->delete();
            $pajak->delete();
        }elseif($pajak->status_pajak == 'Terkait Pegawai'){
            $pajak->delete();
        }
        
        return redirect()->back()->with('messagehapus','Data Pajak Berhasil dihapus');
    }

    public function CetakPajak($id_pajak)
    {

        $pajak = Pajak::with('detailpajak','Jenistransaksi','Pegawai','Gaji.Detailpegawai')->findOrFail($id_pajak);

        // return $pajak->Gaji;

        if($pajak->status_pajak == 'Terkait Pegawai'){
            $now = Carbon::now();
            return view('print.Accounting.cetak-pajak-gaji', compact('pajak','now'));
        }elseif($pajak->status_pajak == 'Tidak Terkait'){
            $now = Carbon::now();
            return view('print.Accounting.cetak-pajak', compact('pajak','now'));
        };

        
    }
}
