<?php

namespace App\Http\Requests\Kepegawaian;

use Illuminate\Foundation\Http\FormRequest;

class Pegawairequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_pegawai' => 'required|unique:tb_kepeg_master_pegawai,id_pegawai|min:5|max:30',
            'nik_pegawai' => 'required|unique:tb_kepeg_master_pegawai,id_pegawai|min:16|max:16',
            'npwp_pegawai' => 'required|unique:tb_kepeg_master_pegawai,id_pegawai|min:16|max:16',
            'nama_panggilan' => 'required|unique:tb_kepeg_master_pegawai,id_pegawai|min:4|max:20',
            'id_jabatan' => 'required|exists:tb_kepeg_master_jabatan,id_jabatan',
            'tempat_lahir' => 'required|min:5|max:20',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-Laki,Perempuan',
            'alamat' => 'required|min:5|max:30',
            'kota_asal' => 'required|min:5|max:15',
            'no_telp' => 'required|min:12|max:15',
            'agama' => 'required|string|in:Hindu,Islam,Budha,Konghucu,Katolik,Protestan',
            'status_perkawinan' => 'required|string|in:lajang,Sudah Menikah',
            'email' => 'required|email',
            'pendidikan_terakhir' =>'required|string|in:SLTP,SLTA,STM/SMK,DIPLOMA,SARJANA,PASCA SARJANA',
            'tanggal_masuk' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'nik_pegawai.required' => 'Error! Anda Belum Mengisi NIK Pegawai',
            'nik_pegawai.unique' => 'Error! NIK Sudah Ada',
            'nik_pegawai.min' => 'Error! Character Minimal :min digit',
            'nik_pegawai.max' => 'Error! Character Maximal :max digit',

            'npwp_pegawai.required' => 'Error! Anda Belum Mengisi NPWP Pegawai',
            'npwp_pegawai.unique' => 'Error! NPWP Sudah Ada',
            'npwp_pegawai.min' => 'Error! Character Minimal :min digit',
            'npwp_pegawai.max' => 'Error! Character Maximal :max digit',

            'nama_pegawai.required' => 'Error! Anda Belum Mengisi Nama Pegawai',
            'nama_pegawai.unique' => 'Error! Nama Pegawai Sudah Ada',
            'nama_pegawai.min' => 'Error! Character Minimal :min digit',
            'nama_pegawai.max' => 'Error! Character Maximal :max digit',
            'kode_pegawai.required' => 'Error! Anda Belum Mengisi Kode Pegawai',

            'nama_panggilan.required' => 'Error! Anda Belum Mengisi Nama Panggilan',
            'nama_panggilan.unique' => 'Error! Nama Panggilan Pegawai Sudah Ada',
            'nama_panggilan.min' => 'Error! Character Minimal :min digit',
            'nama_panggilan.max' => 'Error! Character Maximal :max digit',

            'id_jabatan.required' => 'Error! Anda Belum Memilih Jabatan Pegawai',
            'tempat_lahir.required' => 'Error! Anda Belum Mengisi Tempat Lahir',
            'tempat_lahir.min' => 'Error! Character Minimal :min digit',
            'tempat_lahir.max' => 'Error! Character Maximal :max digit',
            'tanggal_lahir.required' => 'Error! Anda Belum Mengisi Tanggal Lahir',
            'jenis_kelamin.required' => 'Error! Anda Belum Mengisi Jenis Kelamin',

            'alamat.required' => 'Error! Anda Belum Mengisi Alamat',
            'alamat.min' => 'Error! Character Minimal :min digit',
            'alamat.max' => 'Error! Character Maximal :max digit',

            'kota_asal.required' => 'Error! Anda Belum Mengisi Kota Asal',
            'kota_asal.min' => 'Error! Character Minimal :min digit',
            'kota_asal.max' => 'Error! Character Maximal :max digit',

            'no_telp.required' => 'Error! Anda Belum Mengisi No. Telp',
            'no_telp.min' => 'Error! Character Minimal :min digit',
            'no_telp.max' => 'Error! Character Maximal :max digit',

            'agama.required' => 'Error! Anda Belum Mengisi Agama',
            'status_perkawinan.required' => 'Error! Anda Belum Mengisi Status Perkawinan',
            'email.required' => 'Error! Anda Belum Mengisi Email',
            'pendidikan_terakhir.required' => 'Error! Anda Belum Mengisi Pendidikan Terakhir',
            'tanggal_masuk.required' => 'Error! Anda Belum Mengisi Tanggal Masuk',
        ];
    }
}
