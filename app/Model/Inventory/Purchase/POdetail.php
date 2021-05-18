<?php

namespace App\Model\Inventory\Purchase;

use App\Model\Inventory\Hargasparepart;
use App\Model\Inventory\Sparepart;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class POdetail extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_detpo";

    protected $primaryKey = 'id_detail_po';

    protected $fillable = [
        'id_po',
        'id_bengkel',
        'id_sparepart',
        'qty',
        'qty_po_sementara'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function PO()
    {
        return $this->belongsTo(PO::class, 'id_po','id_po');
    }

    public function Sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'id_sparepart','id_sparepart');
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

    
}
