<?php

namespace App\Model\Inventory;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hargasparepart extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_master_harga_sparepart";

    protected $primaryKey = 'id_harga';

    protected $fillable = [
        'id_sparepart',
        'merk_sparepart',
        'id_supplier',
        'harga_jual',
        'id_bengkel'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    // public $with = ['sparepart'];
    public function Sparepart(){
        return $this->belongsTo(Sparepart::class,'id_sparepart','id_sparepart');
    }

    public function Supplier(){
        return $this->belongsTo(Supplier::class,'id_supplier','id_supplier')->withTrashed();
    }

    // public function SupplierBaru(){
    //     return $this->hasMany(Sparepart::class,'id_sparepart')->withTrashed();
    // }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

}
