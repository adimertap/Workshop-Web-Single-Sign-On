<?php

namespace App\Http\Controllers\Auth;

use App\DesaBaru;
use App\Http\Controllers\Controller;
use App\Model\Kepegawaian\Pegawai;
use App\Model\SingleSignOn\Bengkel;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Provinsi;
use App\Kabupaten;
use App\KabupatenBaru;
use App\KecamatanBaru;
use App\Model\Kepegawaian\Jabatan;
use App\ProvinsiBaru;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::SSO;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:6', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd(date('H:i:s', strtotime($data['jam_buka_bengkel'])));
        // return $data ['jam_buka_bengkel'];
        $file = $data['logo_bengkel'];
        $name_file = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . '/image/', $name_file);
        // $imgUrl = url('/image/' . $name_file);

        $bengkel = Bengkel::create([
            'slug' => Str::slug($data['nama_bengkel']),
            'nama_bengkel' => $data['nama_bengkel'],
            'alamat_bengkel' => $data['alamat_bengkel'],
            'longitude' => $data['longitude'],
            'latitude' => $data['latitude'],
            'nohp_bengkel' => $data['nohp_bengkel'],
            'id_desa' => $data['id_desa'],
            'jam_buka_bengkel' => date('H:i:s', strtotime($data['jam_buka_bengkel'])),
            'jam_tutup_bengkel' => date('H:i:s', strtotime($data['jam_tutup_bengkel'])),
            'logo_bengkel' => $name_file
        ]);

        $jabatan = Jabatan::create([
            'id_bengkel' => $bengkel->id_bengkel,
            'nama_jabatan' => 'owner'
        ]);

        $pegawai = Pegawai::create([
            'nama_pegawai' => $data['name'],
            'nama_panggilan' => $data['username'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'no_telp' => $data['no_telp'],
            'nik_pegawai' => $data['nik_pegawai'],
            'npwp_pegawai' => $data['npwp_pegawai'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'id_bengkel' => $bengkel->id_bengkel,
            'id_jabatan' => $jabatan->id_jabatan
        ]);

        $user =  User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'owner',
            'id_bengkel' =>  $bengkel->id_bengkel,
            'id_pegawai' => $pegawai->id_pegawai
        ]);


        return $user;
    }

    public function showRegisterForm()
    {
        $provinsi = ProvinsiBaru::all();

        return view('pages.singlesignon.register', [
            'provinsi' => $provinsi
        ]);
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
