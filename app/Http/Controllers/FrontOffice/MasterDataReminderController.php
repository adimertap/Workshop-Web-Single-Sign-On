<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontOffice\MasterData\Reminderrequest;
use Illuminate\Http\Request;
use App\Model\FrontOffice\MasterDataReminder;
use Illuminate\Support\Facades\Auth;

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

        return view('pages.frontoffice.masterdata.reminder.index', compact('reminder'));
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
    public function store(Reminderrequest $request)
    {
        $request['id_bengkel'] = Auth::user()->id_bengkel;
        $data = $request->all();

        MasterDataReminder::create($data);
        return redirect()->route('reminder.index')->with('messageberhasil', 'Data Reminder Berhasil ditambahkan');
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
    public function update(Reminderrequest $request, $id_master_reminder)
    {
        $reminder = MasterDataReminder::findOrFail($id_master_reminder);
        $reminder->nama_reminder = $request->nama_reminder;
        $reminder->masa_berlaku = $request->masa_berlaku;
        $reminder->km_berlaku = $request->km_berlaku;

        $reminder->update();
        return redirect()->back()->with('messageberhasil', 'Data Reminder Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterDataReminder  $masterDataReminder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_master_reminder)
    {
        $reminder = MasterDataReminder::findOrFail($id_master_reminder);
        $reminder->delete();

        return redirect()->back()->with('messagehapus', 'Data Reminder Berhasil dihapus');
    }
}
