<?php

namespace App\Model\Inventory;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_master_gallery_sparepart";

    protected $primaryKey = 'id_gallery';

    protected $fillable = [
        'id_sparepart',
        'photo',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function sparepart(){
        return $this->belongsTo(Sparepart::class,'id_sparepart','id_sparepart');
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
