<?php

namespace App\Http\Requests\FrontOffice\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class KendaraanRequest extends FormRequest
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
            'kode_kendaraan' => 'required',
            'nama_kendaraan' => 'required',
            'id_jenis_kendaraan' => 'required',
            'id_merk_kendaraan' => 'required',
        ];
    }
}
