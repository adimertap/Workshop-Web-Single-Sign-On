<?php

namespace App\Http\Controllers\Inventory\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Galleryrequest;
use App\Http\Requests\Inventory\Sparepartrequest;
use App\Model\Inventory\Gallery;
use App\Model\Inventory\Hargasparepart;
use App\Model\Inventory\Jenissparepart;
use App\Model\Inventory\Kemasan;
use App\Model\Inventory\Konversi;
use App\Model\Inventory\Merksparepart;
use App\Model\Inventory\Rak;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Supplier;
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
            'Jenissparepart', 'Merksparepart', 'Konversi', 'Gallery', 'Rak', 'Kemasan'
        ])->get();

        return view('pages.inventory.masterdata.sparepart.sparepart', compact('sparepart'));
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
        $kemasan = Kemasan::all();
        $rak = Rak::all();

        $id = Sparepart::getId();
        foreach ($id as $value);
        $idlama = $value->id_sparepart;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_sparepart = 'SP-' . $blt . '/' . $idbaru;


        return view('pages.inventory.masterdata.sparepart.create', compact('jenis_sparepart', 'merk_sparepart', 'konversi', 'gallery', 'rak', 'kode_sparepart', 'kemasan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Sparepartrequest $request)
    {
        // $data = $request->all();
        // $data = Sparepart::create($data);

        // return redirect()->route('sparepart.index')->with('messageberhasil','Data Sparepart Berhasil diubah');

        if ($request->hasfile('photo')) {


            foreach ($request->file('photo') as $image) {

                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/image/', $name);
                $data[] = $name;
            }
        }

        $id = Sparepart::getId();
        foreach ($id as $value);
        $idlama = $value->id_sparepart;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_sparepart = 'SP-' . $blt . '/' . $idbaru;

        $sparepart = new Sparepart;
        $sparepart->id_jenis_sparepart = $request->id_jenis_sparepart;
        $sparepart->id_merk = $request->id_merk;
        $sparepart->id_konversi = $request->id_konversi;
        $sparepart->id_rak = $request->id_rak;
        $sparepart->kode_sparepart = $kode_sparepart;
        $sparepart->nama_sparepart = $request->nama_sparepart;
        $sparepart->stock_min = $request->stock_min;
        $sparepart->id_kemasan = $request->id_kemasan;
        $sparepart->berat_sparepart = $request->berat_sparepart;
        $sparepart->status_jumlah = 'Habis';
        $sparepart->save();

        $gallery = new Gallery;
        $gallery->photo = $name;
        $gallery->id_sparepart = $sparepart->id_sparepart;
        $gallery->save();

        return redirect()->route('sparepart.index')->with('messageberhasil', 'Data Sparepart Berhasil ditambah');
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

        return view('pages.inventory.masterdata.sparepart.detail', [
            'item' => $sparepart,
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
        $item = Sparepart::findOrFail($id_sparepart);
        $jenis_sparepart = Jenissparepart::all();
        $merk_sparepart = Merksparepart::all();
        $konversi = Konversi::all();
        $rak = Rak::all();
        $kemasan = Kemasan::all();

        return view('pages.inventory.masterdata.sparepart.edit', [
            'item' => $item,
            'jenis_sparepart' => $jenis_sparepart,
            'merk_sparepart' => $merk_sparepart,
            'konversi' => $konversi,
            'rak' => $rak,
            'kemasan' => $kemasan
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sparepart)
    {

        $sparepart = Sparepart::findOrFail($id_sparepart);
        $sparepart->id_jenis_sparepart = $request->id_jenis_sparepart;
        $sparepart->id_merk = $request->id_merk;
        $sparepart->id_konversi = $request->id_konversi;
        $sparepart->id_rak = $request->id_rak;
        $sparepart->kode_sparepart = $request->kode_sparepart;
        $sparepart->nama_sparepart = $request->nama_sparepart;
        $sparepart->stock_min = $request->stock_min;
        $sparepart->id_kemasan = $request->id_kemasan;
        $sparepart->berat_sparepart = $request->berat_sparepart;

        // $sparepart->update();
        // $data = $request->all();

        $sparepart->save();

        return redirect()->route('sparepart.index')->with('messageberhasil', 'Data Sparepart Berhasil diubah');
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

        Hargasparepart::where('id_sparepart', $id_sparepart)->delete();
        Gallery::where('id_sparepart', $id_sparepart)->delete();
        $sparepart->delete();

        return redirect()->back()->with('messagehapus', 'Data Sparepart Berhasil dihapus');
    }

    public function gallery(Request $request, $id_sparepart)
    {
        $sparepart = Sparepart::findorFail($id_sparepart);
        $gallery = Gallery::with('sparepart')
            ->where('id_sparepart', $id_sparepart)
            ->get();

        return view('pages.inventory.masterdata.sparepart.gallery')->with([
            'sparepart' => $sparepart,
            'gallery' => $gallery,
        ]);
    }
}
