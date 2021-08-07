<?php

namespace App\Http\Requests\Inventory\Masterdata;

use Illuminate\Foundation\Http\FormRequest;

class Konversirequest extends FormRequest
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
            'satuan' => 'required|min:3|max:20',
        ];
    }

    public function messages()
    {
        return [
            'satuan.required' => 'Error! Anda Belum Mengisi Konversi Satuan',
            'satuan.min' => 'Error! Character Minimal :min digit',
            'satuan.max' => 'Error! Character Maximal :max digit',
        ];
    }
}
