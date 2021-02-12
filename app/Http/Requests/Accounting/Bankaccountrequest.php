<?php

namespace App\Http\Requests\Accounting;

use Illuminate\Foundation\Http\FormRequest;

class Bankaccountrequest extends FormRequest
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
            'nama_bank' => 'required',
            'nama_account' => 'required',
            'jenis_account' => 'required|string|in:Utang,Piutang',
            'nomor_rekening' => 'required|numeric',
            'alamat_account' => 'required',
        ];
    }
}
