<?php

namespace App\Http\Requests\Payroll;

use Illuminate\Foundation\Http\FormRequest;

class Mastertunjanganrequest extends FormRequest
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
            'nama_tunjangan' => 'required|unique:tb_payroll_master_tunjangan,nama_tunjangan',
            'jumlah_tunjangan' => 'required|min:3|max:12',
        ];
    }

    public function messages()
    {
        return [
            'nama_tunjangan.unique' => 'Error! Nama Tunjangan sudah ada',
            'nama_tunjangan.required' => 'Error! Anda Belum Mengisi Nama Tunjangan',
            'jumlah_tunjangan.required' => 'Error! Anda Belum Mengisi Jumlah Tunjangan',
            'jumlah_tunjangan.min' => 'Error! Nominal Minimal :min digit',
            'jumlah_tunjangan.max' => 'Error! Nominal Maximal :max digit',
        ];
    }
}
