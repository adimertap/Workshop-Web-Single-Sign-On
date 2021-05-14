<?php

namespace App\Http\Requests\Accounting\Prf;

use Illuminate\Foundation\Http\FormRequest;

class Statusbayar extends FormRequest
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
            'status_bayar' => 'required|string|in:Sudah Dibayar,Belum Dibayar',
            'tanggal_bayar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tanggal_bayar.required' => 'Error! Anda Belum Mengisi Tanggal Bayar',
        ];
    }
}
