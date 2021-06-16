<?php

namespace App\Http\Requests\Inventory\Masterdata;

use Illuminate\Foundation\Http\FormRequest;

class Spareparteditrequest extends FormRequest
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
            'nama_sparepart' => 'required|min:5|max:50',
            'stock_min' => 'required|min:1|max:20',
            'berat_sparepart' =>  'required|min:1|max:4'
        ];
    }

    public function messages()
    {
        return [
            'nama_sparepart.required' => 'Error! Anda Belum Mengisi Nama Sparepart',
            'nama_sparepart.min' => 'Error! Character Minimal :min digit',
            'nama_sparepart.max' => 'Error! Character Maximal :max digit',

            'stock_min.required' => 'Error! Anda Belum Mengisi Stock Minimal',
            'stock_min.min' => 'Error! Nominal Minimal :min digit',
            'stock_min.max' => 'Error! Nominal Maximal :max digit',

            'berat_sparepart.required' => 'Error! Anda Belum Mengisi Berat Sparepart',
            'berat_sparepart.min' => 'Error! Nominal Minimal :min digit',
            'berat_sparepart.max' => 'Error! Nominal Maximal :max digit',


        ];
    }
}
