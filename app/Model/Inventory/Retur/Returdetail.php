<?php

namespace App\Model\Inventory\Retur;

use App\Model\Inventory\Sparepart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Returdetail extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_detretur";

    protected $primaryKey = 'id_detail_retur';

    protected $fillable = [
        'id_retur',
        'id_sparepart',
        'qty_retur',
        'keterangan',

    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Retur()
    {
        return $this->belongsTo(Retur::class, 'id_retur','id_retur');
    }

    public function Sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'id_sparepart','id_sparepart');
    }
}
