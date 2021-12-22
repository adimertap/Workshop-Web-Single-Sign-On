<?php

namespace App\Http\Controllers\SingleSignOn;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Kepegawaian\Pegawai;
use App\Model\SingleSignOn\Cabang;
use App\Model\SingleSignOn\PaymentBengkel;
use Illuminate\Support\Facades\Auth;

class DashboardSSOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        $cabang = Cabang::where('id_bengkel', Auth::user()->bengkel->id_bengkel)->get();

        $payment_bengkel = PaymentBengkel::where('id_bengkel', Auth::user()->bengkel->id_bengkel)->orderBy('id_payment_bengkel', 'DESC')->first();
        

        return view('pages.singlesignon.dashboard.dashboardsso', compact('today', 'tanggal_tahun', 'payment_bengkel','cabang'));
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

    public function setpusat(){
        $pegawai = Pegawai::where('id_cabang','=', Auth::user()->pegawai->cabang->id_cabang)->first();
        $pegawai->id_cabang = null;

        $pegawai->save();
        return redirect()->route('dashboardsso');
    }
}
