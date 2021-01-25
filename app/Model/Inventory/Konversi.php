<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class Konversi extends Model
{
    protected $table = "tb_inventory_master_konversi";

    protected $primaryKey = 'id_konversi';

    protected $fillable = [
        'satuan',
    ];

    protected $hidden =[ 

    ];

    public $timestamps = false;
}
