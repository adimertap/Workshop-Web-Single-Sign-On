<?php

namespace App\Http\Controllers\SingleSignOn\Manajemen;

use App\Http\Controllers\Controller;
use App\Model\Kepegawaian\Pegawai;
use App\Model\SingleSignOn\ManajemenUser;
use App\Model\SingleSignOn\Role;
use App\Model\SingleSignOn\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManajemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::ownership()->get();
        $pegawai = Pegawai::all();
        $users = User::all();

        return view('pages.singlesignon.manajemen.user', compact('user', 'pegawai', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        $users = User::all();
        $role = Role::all();

        return view('pages.singlesignon.manajemen.create-user', compact('pegawai', 'users', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // return $request->role;
        $request['id_bengkel'] = Auth::user()->id_bengkel;
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['role'] = null;

        $user = User::create($data);

        foreach ($request->role as $item) {
            RoleUser::create([
                'id_user' => $user->id,
                'id_role' => (int)$item
            ]);
        }
        return redirect()->route('manajemen-user.index')->with('messageberhasil', 'Data Pengguna Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function show(ManajemenUser $manajemenUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        $pegawai = Pegawai::all();

        return view('pages.singlesignon.manajemen.edit-user', [
            'item' => $item,
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->id_pegawai = $request->id_pegawai;
        $users->username = $request->username;
        $users->email = $request->email;
        $users->role = $request->role;

        $users->save();

        return redirect()->route(
            'manajemen-user.index'
        )->with('messageberhasil', 'Data Pengguna Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Role::where('id', $id)->delete();
        RoleUser::where('id', $id)->delete();

        $user->delete();

        return redirect()->back()->with('messagehapus', 'Data Pengguna Berhasil dihapus');
    }
}
