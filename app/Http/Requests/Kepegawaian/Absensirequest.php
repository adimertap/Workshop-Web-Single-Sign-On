<?php

namespace App\Http\Requests\Kepegawaian;

use Illuminate\Foundation\Http\FormRequest;

class Absensirequest extends FormRequest
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
            'id_pegawai' => 'required|unique:tb_kepeg_absensi,id_absensi',
            'absensi' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'id_pegawai.unique' => 'Error! Pegawai Sudah Absen',
            'id_pegawai.required' => 'Error! Anda Belum Mengisi Besaran Gaji',
            'besaran_gaji.min' => 'Error! Nominal Minimal :min digit'
            
        ];
    }
}
