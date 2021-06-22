<?php

namespace App\Http\Requests\Accounting;

use Illuminate\Foundation\Http\FormRequest;

class Jenistransaksirequest extends FormRequest
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
            'nama_transaksi' => 'required|unique:tb_accounting_master_jenis_transaksi,nama_transaksi|min:3|max:50',
            'id_akun' => 'exists:tb_accounting_master_akun,id_akun',
        ];
    }

    public function messages()
    {
        return [
            'nama_transaksi.required' => 'Error! Anda Belum Mengisi Jenis Transaksi',
            'nama_transaksi.unique' => 'Error! Jenis Transaksi Sudah Ada',
            'nama_transaksi.min' => 'Error! Character Minimal :min digit',
            'nama_transaksi.max' => 'Error! Character Maximal :max digit',
        ];
    }
}
