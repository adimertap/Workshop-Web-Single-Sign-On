<?php

namespace App\Http\Requests\Inventory\Masterdata;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            // 'kode_supplier' => 'required',
            'nama_supplier'  => 'required|min:4|max:20',
            'telephone'  => 'required|min:11|max:15',
            'alamat_supplier'  => 'required|min:10|max:40',
            'rekening_supplier'  => 'required|min:5',
            'email' => 'required|email',
            'kode_pos' => 'required|min:3|max:10',
            'nama_sales' => 'required|min:3|max:20',
        ];
    }

    public function messages()
    {
        return [
            'nama_supplier.required' => 'Error! Anda Belum Mengisi Nama Supplier',
            'nama_supplier.min' => 'Error! Character Minimal :min digit',
            'nama_supplier.max' => 'Error! Character Maximal :max digit',

            'telephone.required' => 'Error! Anda Belum Mengisi Telephone Supplier',
            'telephone.min' => 'Error! Character Minimal :min digit',
            'telephone.max' => 'Error! Character Maximal :max digit',

            'rekening_supplier.required' => 'Error! Anda Belum Mengisi Nomor Rekening Supplier',
            'rekening_supplier.min' => 'Error! Character Minimal :min digit',

            'email.required' => 'Error! Anda Belum Mengisi Email Supplier',
            'email.email' => 'Error! Harus Menggunakan Format Email',
           
            'kode_pos.required' => 'Error! Anda Belum Mengisi Kode Pos Supplier',
            'kode_pos.min' => 'Error! Character Minimal :min digit',
            'kode_pos.max' => 'Error! Character Maximal :max digit',

            'nama_sales.required' => 'Error! Anda Belum Mengisi Nama Sales Supplier',
            'nama_sales.min' => 'Error! Character Minimal :min digit',
            'nama_sales.max' => 'Error! Character Maximal :max digit',
        ];
    }
}
