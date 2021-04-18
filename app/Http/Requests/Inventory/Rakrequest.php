<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class Rakrequest extends FormRequest
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
            // 'kode_rak' => 'required',
            'nama_rak' => 'required|unique:tb_inventory_master_rak,nama_rak|min:3|max:30',
            'jenis_rak' => 'required|string|in:Fast Moving,Slow Moving,Sales',
        ];
    }

    public function messages()
    {
        return [
            'nama_rak.required' => 'Error! Anda Belum Mengisi Nama Rak',
            'nama_rak.unique' => 'Error! Nama Rak Sudah Ada',
            'nama_rak.min' => 'Error! Character Minimal :min digit',
            'nama_rak.max' => 'Error! Character Maximal :max digit',

            'jenis_rak.required' => 'Error! Anda Belum Memilih Jenis Rak',
        ];
    }
}
