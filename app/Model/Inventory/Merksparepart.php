<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Merksparepart extends Model
{

    

    protected $table = "tb_inventory_master_merk_sparepart";

    protected $primaryKey = 'id_merk';

    protected $fillable = [
        'id_jenis_sparepart',
    	'kode_merk',
    	'merk_sparepart',
    ];

    protected $hidden =[ 

    ];

    public $timestamps = false;

    // public function Mastermerk(){
    //     return $this->hasMany(Sparepart::class, 'id_merk','id_merk');
    // }

    public function jenissparepart(){
        return $this->belongsTo(Jenissparepart::class,'id_jenis_sparepart','id_jenis_sparepart');
    }

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_inventory_master_merk_sparepart')->orderBy('id_merk','DESC')->take(1)->get();

    }
}
