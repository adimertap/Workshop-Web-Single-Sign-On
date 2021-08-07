<?php

namespace App\Http\Controllers\Inventory\Masterdata;
use App\Http\Requests\Inventory\Merksparepartrequest;
use App\Model\Inventory\Merksparepart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Masterdata\Merkspareparteditrequest;
use App\Http\Requests\Inventory\Masterdata\Merksparepartrequest as MasterdataMerksparepartrequest;
use App\Model\Inventory\Jenissparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\New_;

class MasterdatamerksparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $merksparepart = Merksparepart::with([
            'jenissparepart'])->get();
            
        $jenis_sparepart = Jenissparepart::all();
        $id = Merksparepart::getId();
        foreach($id as $value);
        $idlama = $value->id_merk;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_merk = 'MRK-'.$blt.'/'.$idbaru;
        // // Cek nilai merksparepart -> array
        // // dd($merksparepart); 

        return view('pages.inventory.masterdata.merksparepart',compact('merksparepart','jenis_sparepart','kode_merk'));
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
    public function store(MasterdataMerksparepartrequest $request)
    {
        $id = Merksparepart::getId();
        foreach($id as $value);
        $idlama = $value->id_merk;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_merk = 'MRK-'.$blt.'/'.$idbaru;

        $merksparepart = new Merksparepart;
        $merksparepart->id_jenis_sparepart = $request->id_jenis_sparepart;
        $merksparepart->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        $merksparepart->kode_merk = $kode_merk;
        $merksparepart->merk_sparepart = $request->merk_sparepart;

        $merksparepart->save();
        return redirect()->back()->with('messageberhasil','Data Merk Sparepart Berhasil ditambahkan');
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
    public function edit($id_merk)
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
    public function update(Request $request, $id_merk)
    {
        $merksparepart = Merksparepart::findOrFail($id_merk);
        $merksparepart->id_jenis_sparepart = $request->id_jenis_sparepart;
        $merksparepart->kode_merk = $request->kode_merk;
        $merksparepart->merk_sparepart = $request->merk_sparepart;

        $merksparepart->update();
        return redirect()->back()->with('messageberhasil','Data Merk Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_merk)
    {
        $merksparepart = Merksparepart::findOrFail($id_merk);
        $merksparepart->delete();

        return redirect()->back()->with('messagehapus','Data Merk Berhasil dihapus');
    }

}
