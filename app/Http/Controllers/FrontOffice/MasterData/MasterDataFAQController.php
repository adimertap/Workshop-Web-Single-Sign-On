<?php

namespace App\Http\Controllers\FrontOffice\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontOffice\MasterData\Faqrequest;
use Illuminate\Http\Request;
use App\Model\FrontOffice\MasterDataFAQ;

class MasterDataFAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = MasterDataFAQ::get();

        return view('pages.frontoffice.masterdata.faq.main', compact('faq'));
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
    public function store(Faqrequest $request)
    {
        $data = $request->all();

        MasterDataFAQ::create($data);
        return redirect()->route('faq.index')->with('messageberhasil', 'Data FAQ Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterDataFAQ  $masterDataFAQ
     * @return \Illuminate\Http\Response
     */
    public function show(MasterDataFAQ $masterDataFAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterDataFAQ  $masterDataFAQ
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterDataFAQ $masterDataFAQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterDataFAQ  $masterDataFAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Faqrequest $request, $id_faq)
    {
        $faq = MasterDataFAQ::findOrFail($id_faq);
        $faq->pertanyaan_faq = $request->pertanyaan_faq;
        $faq->jawaban_faq = $request->jawaban_faq;

        $faq->update();
        return redirect()->back()->with('messageberhasil', 'Data FAQ Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterDataFAQ  $masterDataFAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_faq)
    {
        $faq = MasterDataFAQ::findOrFail($id_faq);
        $faq->delete();

        return redirect()->back()->with('messagehapus', 'Data FAQ Berhasil dihapus');
    }
}
