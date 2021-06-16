<?php

namespace App\Http\Controllers\Inventory\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Hargasparepartrequest;
use App\Http\Requests\Inventory\Masterdata\Hargaspareparteditrequest;
use App\Http\Requests\Inventory\Masterdata\Hargasparepartrequest as MasterdataHargasparepartrequest;
use App\Model\Inventory\Hargasparepart;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterdatahargasparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $harga = Hargasparepart::with([
            'Sparepart', 'Supplier'
        ])->get();

        $sparepart = Sparepart::where([['status_harga', '=', 'Belum Terisi']])->get();
        // $sparepart = Sparepart::all();
        $supplier = Supplier::all();

        return view('pages.inventory.masterdata.hargasparepart', compact('harga','sparepart','supplier'));
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
    public function store(MasterdataHargasparepartrequest $request)
    {
        $harga = new Hargasparepart;
        $harga->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        $harga->id_sparepart = $request->id_sparepart;
        $harga->id_supplier = $request->id_supplier;
        $harga->harga_jual = $request->harga_jual;

        $sparepart = Sparepart::findOrFail($harga->id_sparepart);
        $sparepart->status_harga = 'Sudah Terisi';
        $sparepart->save();
        // $sparepart = Sparepart::where('id_sparepart',$request->id_sparepart)->first();

        $harga->save();
        return redirect()->back()->with('messageberhasil','Data Harga Sparepart Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_harga)
    {
        $harga = Hargasparepart::findOrFail($id_harga);
        $harga->harga_jual = $request->harga_jual;
        $harga->id_supplier = $request->id_supplier;

        $harga->update();
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_harga)
    {
        
        $harga = Hargasparepart::findOrFail($id_harga);
        $harga->delete();

        $sparepart = Sparepart::findOrFail($harga->id_sparepart);
        $sparepart->status_harga = 'Belum Terisi';
        $sparepart->save();
        

        return redirect()->back()->with('messagehapus','Data Harga Sparepart Berhasil dihapus');
    }
}