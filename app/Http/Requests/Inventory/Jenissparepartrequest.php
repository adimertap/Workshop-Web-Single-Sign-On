<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class Jenissparepartrequest extends FormRequest
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
            'jenis_sparepart' => 'required|unique:tb_inventory_master_jenis_sparepart,jenis_sparepart|min:3|max:30',
    	    'keterangan' => 'min:4|max:300',
            'fungsi' => 'required|string|in:MOTOR,MOBIL',
        ];
    }
}
