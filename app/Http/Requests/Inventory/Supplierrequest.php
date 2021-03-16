<?php

namespace App\Http\Requests\Inventory;

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
            'nama_supplier'  => 'required',
            'telephone'  => 'required',
            'alamat_supplier'  => 'required',
            'rekening_supplier'  => 'required',
            'email' => 'required',
            'kode_pos' => 'required',
            'nama_sales' => 'required',
        ];
    }
}
