<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class Hargasparepartrequest extends FormRequest
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
            'id_sparepart' =>'required|unique:tb_inventory_master_harga_sparepart,id_sparepart',
            'id_supplier' =>'required',
            'harga_jual' =>'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'id_sparepart.required' => 'Error! Anda Belum Memilih Sparepart',
            'id_sparepart.unique' => 'Error! Sparepart Sudah Ada Harga',
            'id_supplier.required' => 'Error! Anda Belum Memilih Supplier',
       
            'harga_jual.required' => 'Error! Anda Belum Memasukan Harga Jual',
            'harga_jual.min' => 'Error! Character Minimal :min digit',
        ];
    }
}
