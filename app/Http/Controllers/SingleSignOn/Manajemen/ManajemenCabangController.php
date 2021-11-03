<?php

namespace App\Http\Controllers\SingleSignOn\Manajemen;

use App\DesaBaru;
use App\Http\Controllers\Controller;
use App\KabupatenBaru;
use App\KecamatanBaru;
use App\Model\Kepegawaian\Pegawai;
use App\Model\SingleSignOn\Cabang;
use App\Model\SingleSignOn\Role;
use App\User;
use Illuminate\Http\Request;

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

        return view('pages.singlesignon.manajemen.create-cabang', compact('pegawai', 'users', 'role'));
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
}
