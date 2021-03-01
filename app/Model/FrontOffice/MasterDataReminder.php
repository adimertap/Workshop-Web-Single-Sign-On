<?php

namespace App\Model\FrontOffice;

use Illuminate\Database\Eloquent\Model;

class MasterDataReminder extends Model
{
    protected $table = "tb_fo_master_jenis_kendaraan";

    protected $primaryKey = 'id_jenis_kendaraan';

    protected $fillable = [
        'kode_kendaraan', 'nama_kendaraan', 'warna_kendaraan', 'jenis_kendaraan', 'merk_kendaraan'
    ];

    protected $hidden = [];

    public $timestamps = false;
}
