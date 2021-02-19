<?php

namespace App\Http\Controllers\Inventory\Masterdata;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Sparepartrequest;
use App\Model\Inventory\Gallery;
use App\Model\Inventory\Hargasparepart;
use App\Model\Inventory\Jenissparepart;
use App\Model\Inventory\Konversi;
use App\Model\Inventory\Merksparepart;
use App\Model\Inventory\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MasterdatasparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sparepart = Sparepart::with([
            'Jenissparepart', 'Merksparepart','Konversi','Gallery'
        ])->get();

        $jenis_sparepart = Jenissparepart::all();
        $merk_sparepart = Merksparepart::all();
        $konversi = Konversi::all();

        return view('pages.inventory.masterdata.sparepart.sparepart', compact('sparepart','jenis_sparepart','merk_sparepart','konversi','Gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_sparepart = Jenissparepart::all();
        $merk_sparepart = Merksparepart::all();
        $konversi = Konversi::all();
        $gallery = Gallery::all();

        return view('pages.inventory.masterdata.sparepart.create', compact('jenis_sparepart','merk_sparepart','konversi','gallery')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Sparepartrequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_sparepart);

        Sparepart::create($data);
        return redirect()->route('sparepart.index')->with('messageberhasil','Data Sparepart Berhasil ditambahkan');
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
        $jenis_sparepart = Jenissparepart::all();
        $merk_sparepart = Merksparepart::all();
        $konversi = Konversi::all();
        
        return view('pages.inventory.masterdata.sparepart.detail',[
            'item' => $sparepart,
            'jenis_sparepart' => $jenis_sparepart,
            'merk_sparepart' => $merk_sparepart,
            'konversi' => $konversi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sparepart)
    {
        $sparepart = Sparepart::findOrFail($id_sparepart);
        $jenis_sparepart = Jenissparepart::all();
        $merk_sparepart = Merksparepart::all();
        $konversi = Konversi::all();
        
        return view('pages.inventory.masterdata.sparepart.edit',[
            'item' => $sparepart,
            'jenis_sparepart' => $jenis_sparepart,
            'merk_sparepart' => $merk_sparepart,
            'konversi' => $konversi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Sparepartrequest $request, $id_sparepart)
    {
        $sparepart = Sparepart::findOrFail($id_sparepart);
        $sparepart->id_jenis_sparepart = $request->id_jenis_sparepart;
        $sparepart->id_merk = $request->id_merk;
        $sparepart->id_konversi = $request->id_konversi;
        $sparepart->kode_sparepart = $request->kode_sparepart;
        $sparepart->nama_sparepart = $request->nama_sparepart;

        $sparepart->update();
        return redirect()->back()->with('messageberhasil','Data Sparepart Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sparepart)
    {
        $sparepart = Sparepart::findOrFail($id_sparepart);
        $sparepart->delete();

        return redirect()->back()->with('messagehapus','Data Sparepart Berhasil dihapus');
    }

    public function gallery(Request $request, $id_sparepart)
    {
        $sparepart = Sparepart::findorFail($id_sparepart);
        $jenis_sparepart = Jenissparepart::all();
        $merk_sparepart = Merksparepart::all();
        $konversi = Konversi::all();
        $gallery = Gallery::with('sparepart')
            ->where('id_sparepart',$id_sparepart)
            ->get();

        return view('pages.inventory.masterdata.sparepart.gallery')->with([
            'sparepart' => $sparepart,
            'gallery' => $gallery,
            'jenis_sparepart' => $jenis_sparepart,
            'merk_sparepart' => $merk_sparepart,
            'konversi' => $konversi,
        ]);
    }


}
