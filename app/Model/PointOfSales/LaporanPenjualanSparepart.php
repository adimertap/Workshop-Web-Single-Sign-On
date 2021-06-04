<?php

namespace App\Model\PointOfSales;

use App\Model\FrontOffice\PenjualanSparepart;
use App\Model\Kepegawaian\Pegawai;
use App\Model\Service\PenerimaanService;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;

class LaporanPenjualanSparepart extends Model
{
    protected $table = "tb_pos_laporan";

    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'id_penjualan_sparepart', 'diskon', 'ppn', 'total_tagihan', 'nominal_bayar', 'kembalian', 'id_pegawai', 'id_bengkel'
    ];

    protected $hidden = [];

    public $timestamps = false;

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

    public function penjualan_sparepart()
    {
        return $this->belongsTo(PenjualanSparepart::class, 'id_penjualan_sparepart');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
