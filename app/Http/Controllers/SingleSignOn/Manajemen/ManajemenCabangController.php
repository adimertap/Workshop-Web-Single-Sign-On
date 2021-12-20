<?php

namespace App\Http\Controllers\SingleSignOn\Manajemen;

use App\DesaBaru;
use App\Http\Controllers\Controller;
use App\KabupatenBaru;
use App\KecamatanBaru;
use App\Model\Kepegawaian\Pegawai;
use App\Model\SingleSignOn\Cabang;
use App\Model\SingleSignOn\Role;
use App\Model\SingleSignOn\RoleUser;
use App\ProvinsiBaru;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManajemenCabangController extends Controller
{
    public function index()
    {
        $cabang = Cabang::ownership()->get();

        // $user = User::ownership()->where('role', '!=', 'owner')->get();
        $pegawai = Pegawai::all();
        $cabangs = User::all();

        return view('pages.singlesignon.manajemen.cabang', compact('cabang', 'pegawai', 'cabangs'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        $users = User::all();
        $role = Role::all();

        $provinsi = ProvinsiBaru::all();

        return view('pages.singlesignon.manajemen.create-cabang', compact('pegawai', 'users', 'role', 'provinsi'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['role'] = null;

       

        $user = new User;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->id_bengkel =  Auth::user()->id_bengkel;
        $user->id_pegawai = $pegawai->id_pegawai;
        $user->save();

        foreach ($request->role as $item) {
            RoleUser::create([
                'id_user' => $user->id,
                'id_sso_aplikasi' => (int)$item
            ]);
        }

        $cabang = new Cabang;
        $cabang->nama_cabang = $request->nama_cabang;
        $cabang->alamat_cabang = $request->alamat_cabang;
        $cabang->id_desa = $request->id_desa;
        $cabang->id_bengkel =  Auth::user()->id_bengkel;
        $cabang->save();

        $pegawai = new Pegawai;
        $pegawai->id_bengkel =  Auth::user()->id_bengkel;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->nama_panggilan = $request->username;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->nik_pegawai = $request->nik_pegawai;
        $pegawai->npwp_pegawai = $request->npwp_pegawai;
        $pegawai->npwp_pegawai = $request->no_telp;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->id_jabatan = '38';
        $pegawai->id_ptkp = '1';
        $pegawai->id_cabang = $cabang->id_cabang;
        $pegawai->save();

        return redirect()->route('manajemen-cabang.index')->with('messageberhasil', 'Data Cabang Berhasil ditambahkan');
    }

    public function kabupaten_baru($id)
    {
        $kabupaten = KabupatenBaru::where('id_provinsi', '=', $id)->pluck('name', 'id_kabupaten');
        return json_encode($kabupaten);
    }

    public function kecamatan_baru($id)
    {
        $kecamatan = KecamatanBaru::where('id_kabupaten', '=', $id)->pluck('name', 'id_kecamatan');
        return json_encode($kecamatan);
    }

    public function desa_baru($id)
    {
        $desa = DesaBaru::where('id_kecamatan', '=', $id)->pluck('name', 'id_desa');
        return json_encode($desa);
    }

    public function destroy($id_cabang)
    {
        $cabang = Cabang::findOrFail($id_cabang);

        $cabang->delete();

        return redirect()->back()->with('messagehapus', 'Data Cabang Berhasil dihapus');
    }
}
