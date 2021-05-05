<?php

namespace App\Http\Requests\FrontOffice\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class MerkKendaraanRequest extends FormRequest
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
            'id_jenis_kendaraan' => 'required',
            'merk_kendaraan' => 'required|unique:tb_fo_master_merk_kendaraan,merk_kendaraan|min:3|max:30'
        ];
    }

    public function messages()
    {
        return [
            'id_jenis_kendaraan.required' => 'Error! Anda Belum Mengisi Jenis Kendaraan',
            'merk_kendaraan.required' => 'Error! Anda Belum Mengisi Merk Kendaraan',
            'merk_kendaraan.unique' => 'Error! Merk Kendaraan Sudah Ada',
            'merk_kendaraan.min' => 'Error! Character Minimal :min digit',
            'merk_kendaraan.max' => 'Error! Character Maximal :max digit'
        ];
    }
}
