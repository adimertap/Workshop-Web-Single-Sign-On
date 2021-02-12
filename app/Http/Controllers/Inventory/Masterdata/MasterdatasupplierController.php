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
        
        
        return view('pages.inventory.masterdata.supplier',compact('supplier') );
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
    public function store(Supplierrequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_supplier);

        Supplier::create($data);
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

        $supplier->save();
        return redirect()->back()->with('messageberhasil','Data Supplier Berhasil diubah');
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
