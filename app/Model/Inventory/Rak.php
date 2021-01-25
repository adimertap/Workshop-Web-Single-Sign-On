<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $table = "tb_inventory_master_rak";

    protected $primaryKey = 'id_rak';

    protected $fillable = [
        'kode_rak',
        'nama_rak',
        'jenis_rak',
    ];

    protected $hidden =[ 

    ];

    public $timestamps = false;
}
