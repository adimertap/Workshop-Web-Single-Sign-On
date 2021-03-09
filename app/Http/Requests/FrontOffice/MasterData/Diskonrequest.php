<?php

namespace App\Http\Requests\FrontOffice\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class Diskonrequest extends FormRequest
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
            'nama_diskon' => 'required',
            'jumlah_diskon' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ];
    }
}
