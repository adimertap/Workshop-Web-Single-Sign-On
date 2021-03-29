<?php

namespace App\Http\Controllers\Note\Noteadim;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Retur\Retur;
use App\Model\Note\noteadim\Adim;
use Illuminate\Http\Request;

class NoteadimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note = Adim::get();

        return view('notesadim.notes', compact('note'));
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
        $note = new Adim;
        $note->tanggal = $request->tanggal;
        $note->modul = $request->modul;
        $note->catatan = $request->catatan;
        $note->progress = $request->progress;
        $note->status = $request->status;
        $note->save();

        return redirect()->route('Note-adim.index')->with('messageberhasil','Yeay Data Progress Harian Berhasil ditambahkan');
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
    public function update(Request $request, $id_catatan)
    {
        $note = Adim::findOrFail($id_catatan);
        $note->progress = $request->progress;
        
        $note->save();
        return redirect()->back()->with('messageberhasil','Data Progress Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_catatan)
    {
        $note = Adim::findOrFail($id_catatan);
        $note->delete();

        return redirect()->back()->with('messagehapus','Data Catatan Berhasil dihapus');
    }

    public function setStatus(Request $request, $id_catatan)
    {
        $request->validate([
            'statuspengerjaan' => 'required|in:On Progress,Sudah Selesai'
        ]);

        $note = Adim::findOrFail($id_catatan);
        $note->status = $request->statuspengerjaan;
        
        $note->save();
        return redirect()->route('Note-adim.index');
    }
}
