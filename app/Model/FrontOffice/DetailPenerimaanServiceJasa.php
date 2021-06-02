<?php

namespace App\Model\FrontOffice;

use App\Model\Inventory\Sparepart;
use App\Model\Service\PenerimaanService;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class DetailPenerimaanServiceJasa extends Model
{
    use SoftDeletes;

    protected $table = "tb_service_detail_perbaikan";

    protected $primaryKey = 'id_detail_perbaikan';

    protected $fillable = [
        'id_service_advisor',
        'id_jenis_perbaikan',
        'total_harga',
        'id_bengkel'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    // relations
    public function penerimaan_jasa()
    {
        return $this->belongsTo(PenerimaanService::class, 'id_service_advisor', 'id_service_advisor');
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
