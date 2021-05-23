<?php

namespace App\Http\Requests\Payroll\Gaji;

use Illuminate\Foundation\Http\FormRequest;

class Gajirequest extends FormRequest
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
            'tahun_gaji' => 'required|min:4|max:4',
            'bulan_gaji' => 'required',
            'id_jenis_transaksi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tahun_gaji.required' => 'Error! Anda Belum Mengisi Tahun Gaji',
            'tahun_gaji.min' => 'Error! Character Minimal :min digit',
            'tahun_gaji.max' => 'Error! Character Maximal :max digit',

            'bulan_gaji.required' => 'Error! Anda Belum Mengisi Bulan Gaji',
            'id_jenis_transaksi.required' => 'Error! Anda Belum Mengisi Jenis Transaksi',
            
          
        ];
    }
}
