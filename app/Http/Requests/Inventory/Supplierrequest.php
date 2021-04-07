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
            'nama_supplier'  => 'required|unique:tb_inventory_master_supplier,nama_supplier',
            'telephone'  => 'required|min:13|max:15',
            'alamat_supplier'  => 'required|min:10|max:40',
            'rekening_supplier'  => 'required',
            'email' => 'required|email',
            'kode_pos' => 'required|min:3|max:10',
            'nama_sales' => 'required|min:3|max:10',
        ];
    }
}
