<?php

namespace App\Model\FrontOffice;

use App\Model\Inventory\Sparepart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class DetailPenjualanSparepart extends Model
{
    use SoftDeletes;

    protected $table = "tb_fo_detail_penjualan_sparepart";

    protected $primaryKey = 'id_detail_penjualan';

    protected $fillable = [
        'id_penjualan_sparepart',
        'jumlah',
        'total_harga'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    // relations
    public function Penjualan()
    {
        return $this->belongsTo(PenjualanSparepart::class, 'id_penjualan_sparepart', 'id_penjualan_sparepart');
    }
}
