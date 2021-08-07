<?php

namespace App\Http\Requests\Inventory\Masterdata;

use Illuminate\Foundation\Http\FormRequest;

class Merksparepartrequest extends FormRequest
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
            'id_jenis_sparepart' => 'required|exists:tb_inventory_master_jenis_sparepart,id_jenis_sparepart',
    	    'merk_sparepart' => 'required|min:3|max:30'
        ];
    }

    public function messages()
    {
        return [
            'id_jenis_sparepart.required' => 'Error! Anda Belum Mengisi Jenis Sparepart',
            'merk_sparepart.required' => 'Error! Anda Belum Mengisi Merk Sparepart',
            'merk_sparepart.min' => 'Error! Character Minimal :min digit',
            'merk_sparepart.max' => 'Error! Character Maximal :max digit'
        ];
    }
}
