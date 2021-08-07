<?php

namespace App\Http\Requests\Inventory\Masterdata;

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
            'jenis_sparepart' => 'required|min:3|max:30',
            'fungsi' => 'required|string|in:MOTOR,MOBIL',
        ];
    }

    public function messages()
    {
        return [
            'jenis_sparepart.required' => 'Error! Anda Belum Mengisi Jenis Sparepart',
            'jenis_sparepart.min' => 'Error! Character Minimal :min digit',
            'jenis_sparepart.max' => 'Error! Character Maximal :max digit',
            'fungsi.required' => 'Error! Anda Belum Memilih Fungsi Jenis Sparepart',

        ];
    }
}
