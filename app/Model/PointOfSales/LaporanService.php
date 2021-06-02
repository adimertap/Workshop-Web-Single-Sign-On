<?php

namespace App\Model\PointOfSales;

use App\Model\FrontOffice\PenjualanSparepart;
use App\Model\Kepegawaian\Pegawai;
use App\Model\Service\PenerimaanService;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;

class LaporanService extends Model
{
    protected $table = "tb_pos_laporan_service";

    protected $primaryKey = 'id_laporan_service';

    protected $fillable = [
        'id_service_advisor', 'tanggal_laporan', 'diskon', 'ppn', 'total_tagihan', 'nominal_bayar', 'kembalian', 'id_pegawai', 'id_bengkel'
    ];

    protected $hidden = [];

    public $timestamps = false;

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

    public function penerimaan_service()
    {
        return $this->belongsTo(PenerimaanService::class, 'id_service_advisor');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
