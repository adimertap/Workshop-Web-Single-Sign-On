<?php

namespace App\Model\FrontOffice;

use Illuminate\Database\Eloquent\Model;

class MasterDataKendaraan extends Model
{
    protected $table = "tb_fo_master_kendaraan";

    protected $primaryKey = 'id_kendaraan';

    protected $fillable = [
        'kode_kendaraan', 'nama_kendaraan', 'warna_kendaraan'
    ];

    protected $hidden = [];

    public $timestamps = false;
}
