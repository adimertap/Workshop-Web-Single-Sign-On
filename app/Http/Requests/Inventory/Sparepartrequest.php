<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class Sparepartrequest extends FormRequest
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
            'id_jenis_sparepart' => 'required|exists:tb_inventory_master_jenis_sparepart,id_jenis_sparepart',
            'id_merk' => 'required|exists:tb_inventory_master_merk_sparepart,id_merk',
            'id_konversi' => 'required|exists:tb_inventory_master_konversi,id_konversi',
            'id_rak' => 'required|exists:tb_inventory_master_rak,id_rak',
            'nama_sparepart' => 'required|unique:tb_inventory_master_sparepart,nama_sparepart|min:5|max:50',
            'stock_min' => 'required|min:1|max:20',
            'id_kemasan' => 'required|exists:tb_inventory_master_kemasan,id_kemasan',
            'berat_sparepart' =>  'required|min:1|max:4'
        ];
    }
    public function messages()
    {
        return [
            'id_jenis_sparepart.required' => 'Error! Anda Belum Mengisi Jenis Sparepart',
            'id_merk.required' => 'Error! Anda Belum Mengisi Merk Sparepart',
            'id_konversi.required' => 'Error! Anda Belum Mengisi Satuan Konversi Sparepart',
            'id_rak.required' => 'Error! Anda Belum Mengisi Penempatan Rak Sparepart',
            'id_kemasan.required' =>'Error! Anda Belum Mengisi Kemasan Sparepart',
            'nama_sparepart.required' => 'Error! Anda Belum Mengisi Nama Sparepart',

            'nama_sparepart.unique' => 'Error! Nama Sparepart Sudah Ada',
            'nama_sparepart.min' => 'Error! Character Minimal :min digit',
            'nama_sparepart.max' => 'Error! Character Maximal :max digit',

            'stock_min.required' => 'Error! Anda Belum Mengisi Stock Minimal',
            'stock_min.min' => 'Error! Nominal Minimal :min digit',
            'stock_min.max' => 'Error! Nominal Maximal :max digit',

            'berat_sparepart.required' => 'Error! Anda Belum Mengisi Berat Sparepart',
            'berat_sparepart.min' => 'Error! Nominal Minimal :min digit',
            'berat_sparepart.max' => 'Error! Nominal Maximal :max digit',


        ];
    }
}
