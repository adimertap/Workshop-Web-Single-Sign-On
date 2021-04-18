<?php

namespace App\Http\Requests\Accounting;

use Illuminate\Foundation\Http\FormRequest;

class Foprequest extends FormRequest
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
            'nama_fop' => 'required|unique:tb_accounting_master_fop,nama_fop|min:3|max:30'
        ];
    }

    public function messages()
    {
        return [
            'nama_fop.required' => 'Error! Anda Belum Mengisi Nama Form of Payment',
            'nama_fop.unique' => 'Error! Form of Payment Sudah Ada',
            'nama_fop.min' => 'Error! Character Minimal :min digit',
            'nama_fop.max' => 'Error! Character Maximal :max digit',
        ];
    }
}
