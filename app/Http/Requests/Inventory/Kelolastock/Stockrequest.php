<?php

namespace App\Http\Requests\Inventory\Kelolastock;

use Illuminate\Foundation\Http\FormRequest;

class Stockrequest extends FormRequest
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
            'qty_min' => 'required|numeric',
            'qty_stock' => 'required|numeric',
            'opname_terakhir' => 'required|date',
        ];
    }
}
