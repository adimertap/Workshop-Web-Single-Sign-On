<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Jenissparepart extends Model
{

    use SoftDeletes;
    
    protected $table = "tb_inventory_master_jenis_sparepart";

    protected $primaryKey = 'id_jenis_sparepart';

    protected $fillable = [
    	'jenis_sparepart',
    	'keterangan',
        'fungsi'
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
