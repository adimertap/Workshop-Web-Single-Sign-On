<?php

namespace App\Http\Requests\FrontOffice;

use Illuminate\Foundation\Http\FormRequest;

class CustomerBengkelRequest extends FormRequest
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
            'nama_customer' => 'required',
            'email_customer' => 'required',
            'nohp_customer' => 'required',
            'alamat_customer' => 'required',
        ];
    }
}
