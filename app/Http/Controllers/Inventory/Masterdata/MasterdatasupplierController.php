<?php

namespace App\Http\Controllers\Inventory\Masterdata;
use App\Http\Requests\Inventory\Supplierrequest;
use App\Model\Inventory\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class MasterdatasupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::get();
        
        
        
        return view('pages.inventory.masterdata.supplier.supplier',compact('supplier') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Supplier::getId();
        foreach($id as $value);
        $idlama = $value->id_supplier;
        $idbaru = $idlama + 1;
        $blt = date('m-Y');

        $kode_supplier = 'SUP/'.$idbaru.'/'.$blt;

        return view('pages.inventory.masterdata.supplier.create',compact('kode_supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Supplierrequest $request)
    {
        $id = Supplier::getId();
        foreach($id as $value);
        $idlama = $value->id_supplier;
        $idbaru = $idlama + 1;
        $blt = date('m-Y');

        $kode_supplier = 'SUP/'.$idbaru.'/'.$blt;

        $supplier = new Supplier;
        $supplier->kode_supplier = $kode_supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->telephone = $request->telephone;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->rekening_supplier = $request->rekening_supplier;
        $supplier->email = $request->email;
        $supplier->kode_pos = $request->kode_pos;
        $supplier->nama_sales = $request->nama_sales;
        $supplier->save();

        return redirect()->route('supplier.index')->with('messageberhasil','Data Supplier Berhasil ditambahkan');
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
    public function edit($id_supplier)
    {
        $supplier = Supplier::findOrFail($id_supplier);
        
        $id = Supplier::getId();
        foreach($id as $value);
        $idlama = $value->id_supplier;
        $idbaru = $idlama + 1;
        $blt = date('m-Y');

        $kode_supplier = 'SUP/'.$idbaru.'/'.$blt;

        return view('pages.inventory.masterdata.supplier.edit',[
            'supplier' => $supplier,
            'kode_supplier' => $kode_supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Supplierrequest $request, $id_supplier)
    {
        $supplier = Supplier::findOrFail($id_supplier);
        $supplier->kode_supplier = $request->kode_supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->telephone = $request->telephone;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->rekening_supplier = $request->rekening_supplier;
        $supplier->email = $request->email;
        $supplier->kode_pos = $request->kode_pos;
        $supplier->nama_sales = $request->nama_sales;

        $supplier->update();
        return redirect()->route('masterdatasupplier')->with('messageberhasil','Data Supplier Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_supplier)
    {
        $supplier = Supplier::findOrFail($id_supplier);
        $supplier->delete();

        return redirect()->back()->with('messagehapus','Data Supplier Berhasil dihapus');
    }
}
