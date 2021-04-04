<?php

namespace App\Http\Requests\FrontOffice\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class JenisKendaraanrequest extends FormRequest
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
            'jenis_kendaraan' => 'required|string|in:Motor,Mobil,Sepeda',
            'merk_kendaraan' => 'required'
        ];
    }
}
