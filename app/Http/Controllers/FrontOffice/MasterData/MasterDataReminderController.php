<?php

namespace App\Http\Controllers\FrontOffice\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FrontOffice\MasterDataReminder;

class MasterDataReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reminder = MasterDataReminder::get();

        return view('pages.frontoffice.masterdata.reminder.main', compact('reminder'));
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
     * @param  \App\MasterDataReminder  $masterDataReminder
     * @return \Illuminate\Http\Response
     */
    public function show(MasterDataReminder $masterDataReminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterDataReminder  $masterDataReminder
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterDataReminder $masterDataReminder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterDataReminder  $masterDataReminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterDataReminder $masterDataReminder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterDataReminder  $masterDataReminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterDataReminder $masterDataReminder)
    {
        //
    }
}
