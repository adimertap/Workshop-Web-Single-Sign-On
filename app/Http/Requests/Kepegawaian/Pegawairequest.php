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
            'nama_panggilan' => 'required|unique:tb_kepeg_master_pegawai,id_pegawai|min:4|max:20',
            'kode_pegawai' => 'required',
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
        ];
    }
}
