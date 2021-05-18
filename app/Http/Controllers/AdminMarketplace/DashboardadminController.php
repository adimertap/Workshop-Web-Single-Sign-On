<?php

namespace App\Http\Controllers\AdminMarketplace;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Marketplace\Faq;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class DashboardadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::where('id_bengkel', Auth::user()->id_bengkel)->get();
        $faqnoanswer = Faq::where('id_bengkel', Auth::user()->id_bengkel)->where('jawaban_faq', NULL)->get();
        $faqtoday = Faq::where('id_bengkel', Auth::user()->id_bengkel)->whereDate('created_at', Carbon::today())->get();

        $totalfaq = count($faq);
        $totaltoday = count($faqtoday);
        $totalnoanswer = count($faqnoanswer);

        
       return view('pages.adminmarketplace.dashboardadminmarketplace',[
           "totalfaq" => $totalfaq,
           "totaltoday" =>$totaltoday,
           "totalnoanswer" =>$totalnoanswer
       ]);
    }

    public function faq()
    {
        $faq = Faq::with('User')->where('id_bengkel', Auth::user()->id_bengkel)->get();
        // dd($faq);
       return view('pages.adminmarketplace.faq',
            ['faq' =>$faq]);
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
    public function update(Request $request, $id)
    {
        // dd($request->jawaban_faq);
        
        $faq = Faq::findOrFail($id);
        $faq->jawaban_faq = $request->jawaban_faq;
      
        $faq->update();
        return redirect()->back()->with('messageberhasil','Data Merk Berhasil diubah');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->back()->with('messagehapus','Data Merk Berhasil dihapus');
    }
}
