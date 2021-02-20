<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class Sparepartrequest extends FormRequest
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
            'id_merk' => 'required|exists:tb_inventory_master_merk_sparepart,id_merk',
            'id_konversi' => 'required|exists:tb_inventory_master_konversi,id_konversi',
            'id_rak' => 'required|exists:tb_inventory_master_rak,id_rak',
            'kode_sparepart' => 'required',
            'nama_sparepart' => 'required',
            'keterangan' => 'required',
            'stock' => 'required|numeric',
            'stock_min' => 'required|numeric'
        ];
    }
}
