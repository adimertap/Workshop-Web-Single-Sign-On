<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class Jenissparepart extends Model
{
    protected $table = "tb_inventory_master_jenis_sparepart";

    protected $primaryKey = 'id_jenis_sparepart';

    protected $fillable = [
    	'jenis_sparepart',
    	'keterangan'
    ];

    protected $hidden =[ 

    ];

    public $timestamps = false;

    public function Mastersparepart(){
        return $this->hasMany(Sparepart::class, 'id_jenis_sparepart','id_jenis_sparepart');
    }

    public function Mastermerk(){
        return $this->hasMany(Merksparepart::class, 'id_merk','id_merk');
    }
}
