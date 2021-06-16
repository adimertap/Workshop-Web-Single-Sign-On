<?php

namespace App\Http\Requests\Inventory\Masterdata;

use Illuminate\Foundation\Http\FormRequest;

class Hargaspareparteditrequest extends FormRequest
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
            'harga_jual' =>'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'harga_jual.required' => 'Error! Anda Belum Memasukan Harga Jual',
            'harga_jual.min' => 'Error! Character Minimal :min digit',
        ];
    }
}
