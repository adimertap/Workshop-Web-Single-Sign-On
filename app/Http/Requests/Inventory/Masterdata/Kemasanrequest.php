<?php

namespace App\Http\Requests\Inventory\Masterdata;

use Illuminate\Foundation\Http\FormRequest;

class Kemasanrequest extends FormRequest
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
            'nama_kemasan' => 'required|unique:tb_inventory_master_kemasan,nama_kemasan|min:3|max:20',
        ];
    }

    public function messages()
    {
        return [
            'nama_kemasan.required' => 'Error! Anda Belum Mengisi Nama Kemasan',
            'nama_kemasan.unique' => 'Error! Nama Kemasan Sudah Ada',
            'nama_kemasan.min' => 'Error! Character Minimal :min digit',
            'nama_kemasan.max' => 'Error! Character Maximal :max digit',
        ];
    }
}
