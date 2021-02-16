<?php

namespace App\Model\Inventory\Kelolastock;

use App\Model\Inventory\Rak;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "tb_inventory_stock";

    protected $primaryKey = 'id_stock';

    protected $fillable = [
    	'id_rak',
    	'id_sparepart',
        'qty_min',
        'qty_stock',
        'opname_terakhir',
    ];

    protected $hidden =[ 

    ];

    public $timestamps = false;

    public function Sparepart(){
        return $this->hasMany(Sparepart::class, 'id_sparepart','id_sparepart');
    }

    public function Rak(){
        return $this->hasMany(Rak::class, 'id_rak','id_rak');
    }
}
