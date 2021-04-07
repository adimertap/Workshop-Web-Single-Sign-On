<?php

namespace App\Http\Requests\Payroll;

use Illuminate\Foundation\Http\FormRequest;

class Mastergajipokokrequest extends FormRequest
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
            'id_jabatan' => 'required|unique:tb_payroll_master_gaji_pokok,id_jabatan',
            'besaran_gaji' => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'id_jabatan.unique' => 'Error! Jabatan sudah terisi',
            'besaran_gaji.required' => 'Error! Anda Belum Mengisi Besaran Gaji',
            'besaran_gaji.min' => 'Error! Nominal Minimal :min digit'
            
        ];
    }
}
