<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class Galleryrequest extends FormRequest
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
            'id_sparepart' => 'required|integer|exists:tb_inventory_master_sparepart,id_sparepart',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ];
    }
}
