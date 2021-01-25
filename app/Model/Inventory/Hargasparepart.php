<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class Hargasparepart extends Model
{
    protected $table = "tb_inventory_master_harga_sparepart";

    protected $primaryKey = 'id_harga';

    protected $fillable = [
        'id_sparepart',
        'merk_sparepart',
        'id_supplier',
        'harga_beli',
        'harga_jual',
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;

    public function Sparepart(){
        return $this->belongsTo(Sparepart::class,'id_sparepart','id_sparepart');
    }

    public function Supplier(){
        return $this->belongsTo(Supplier::class,'id_supplier','id_supplier');
    }

}
