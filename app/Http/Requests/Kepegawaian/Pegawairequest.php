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
            'nama_pegawai' => 'required',
            'nama_panggilan' => 'required',
            'id_jabatan' => 'required|exists:tb_kepeg_master_jabatan,id_jabatan',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-Laki,Perempuan',
            'alamat' => 'required',
            'kota_asal' => 'required',
            'no_telp' => 'required',
            'agama' => 'required|string|in:Hindu,Islam,Budha,Konghucu,Katolik,Protestan',
            'status_perkawinan' => 'required|string|in:lajang,Sudah Menikah',
            'email' => 'required|email',
            'pendidikan_terakhir' =>'required|string|in:SLTP,SLTA,STM/SMK,DIPLOMA,SARJANA,PASCA SARJANA',
            'tanggal_masuk' => 'required|date',
        ];
    }
}
