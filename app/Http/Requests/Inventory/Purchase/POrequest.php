<?php

namespace App\Http\Requests\Inventory\Purchase;

use Illuminate\Foundation\Http\FormRequest;

class POrequest extends FormRequest
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
            'id_pegawai' => 'required|exists:tb_kepeg_master_pegawai,id_pegawai',
            'id_akun' => 'required|exists:tb_accounting_master_akun,id_akun',
            'id_supplier' => 'required|exists:tb_inventory_master_supplier,id_supplier',
            'kode_po' => 'required',
            'tanggal_po' => 'required|date',
            'approve_po' => 'required|string|in:Approved,Not Approved,Pending',
            'approve_ap' => 'required|string|in:Approved,Not Approved,Pending',
            'keterangan' => 'required',
        ];
    }
}
