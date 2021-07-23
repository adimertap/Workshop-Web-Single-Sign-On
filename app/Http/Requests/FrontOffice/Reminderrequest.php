<?php

namespace App\Http\Requests\FrontOffice;

use Illuminate\Foundation\Http\FormRequest;

class Reminderrequest extends FormRequest
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
            'nama_reminder' => 'required',
            'masa_berlaku' => 'required',
            'km_berlaku' => 'required',
        ];
    }
}
