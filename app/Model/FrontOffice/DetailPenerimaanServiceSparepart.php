<?php

namespace App\Model\FrontOffice;

use App\Model\Service\PenerimaanService;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPenerimaanServiceSparepart extends Model
{
    use SoftDeletes;

    protected $table = "tb_service_detail_sparepart";

    protected $primaryKey = 'id_detail_sparepart';

    protected $fillable = [
        'id_service_advisor',
        'id_sparepart',
        'jumlah',
        'harga',
        'total_harga'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    // relations
    public function penerimaan_sparepart()
    {
        return $this->belongsTo(PenerimaanService::class, 'id_service_advisor', 'id_service_advisor');
    }
}
