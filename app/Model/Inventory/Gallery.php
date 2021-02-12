<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = "tb_inventory_master_gallery_sparepart";

    protected $primaryKey = 'id_gallery';

    protected $fillable = [
        'id_sparepart',
        'gambar',
    ];

    protected $hidden =[ 

    ];

    public $timestamps = false;

    public function sparepart(){
        return $this->belongsTo(Sparepart::class,'id_sparepart','id_sparepart');
    }
}
