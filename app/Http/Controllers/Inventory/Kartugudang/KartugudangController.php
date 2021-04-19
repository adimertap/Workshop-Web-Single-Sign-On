<?php

namespace App\Http\Controllers\Inventory\Kartugudang;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Jenissparepart;
use App\Model\Inventory\Konversi;
use App\Model\Inventory\Merksparepart;
use App\Model\Inventory\Rak;
use App\Model\Inventory\Sparepart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KartugudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sparepart = Sparepart::with([
            'Jenissparepart', 'Merksparepart','Konversi','Gallery','Rak'
        ])->get();
       

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('pages.inventory.kartugudang.kartugudang', compact('sparepart','today','tanggal'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_sparepart)
    {
        $sparepart = Sparepart::findOrFail($id_sparepart);
        // $jenis_sparepart = Jenissparepart::all();
        // $merk_sparepart = Merksparepart::all();
        // $konversi = Konversi::all();
        // $rak = Rak::all();

        return view('pages.inventory.kartugudang.detail',[
            'item' => $sparepart,
            // 'jenis_sparepart' => $jenis_sparepart,
            // 'merk_sparepart' => $merk_sparepart,
            // 'konversi' => $konversi,
            // 'rak' => $rak,
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
