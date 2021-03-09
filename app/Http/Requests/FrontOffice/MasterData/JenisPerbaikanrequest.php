<?php

namespace App\Http\Requests\FrontOffice\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class JenisPerbaikanrequest extends FormRequest
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
            'kode_jenis_perbaikan' => 'required',
            'nama_jenis_perbaikan' => 'required',
            'group_jenis_perbaikan' => 'required|string|in:Service Ringan,Service Berat',
            'harga_jenis_perbaikan' => 'required'
        ];
    }
}
