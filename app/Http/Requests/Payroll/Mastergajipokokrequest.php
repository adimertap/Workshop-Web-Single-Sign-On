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
            'id_jabatan' => 'required|exists:tb_kepeg_master_jabatan,id_jabatan',
            'besaran_gaji' => 'required|numeric',
        ];
    }
}
