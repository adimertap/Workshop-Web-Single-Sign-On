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
            'id_bank' => 'required',
            'nama_account' => 'required|min:10|max:30',
            'jenis_account' => 'required|string|in:Utang,Piutang',
            'nomor_rekening' => 'required|numeric|unique:tb_accounting_master_bank_account,nomor_rekening|min:3',
            'alamat_account' => 'required|min:10|max:60',
        ];
    }

    public function messages()
    {
        return [
            'id_bank.required' => 'Error! Anda Belum Memilih Nama Bank',
            
            'nama_account.required' => 'Error! Anda Belum Mengisi Nama Lengkap Account Bank',
            'nama_account.min' => 'Error! Character Minimal :min digit',
            'nama_account.max' => 'Error! Character Maximal :max digit',

            'jenis_account.required' => 'Error! Anda Belum Mengisi Jenis Account',

            'nomor_rekening.required' => 'Error! Anda Belum Mengisi Nomor Rekening Bank',
            'nomor_rekening.min' => 'Error! Character Minimal :min digit',
            'nomor_rekening.unique' => 'Error! Nomor Rekening Sudah Ada',

            'alamat_account.required' => 'Error! Anda Belum Mengisi Alamat Account Bank',
            'alamat_account.min' => 'Error! Character Minimal :min digit',
            'alamat_account.max' => 'Error! Character Maximal :max digit',
        ];
    }
}
