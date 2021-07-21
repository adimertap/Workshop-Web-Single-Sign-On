<?php

namespace App\Model\Accounting;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporanlabarugi extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_laporan_laba_rugi";

    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'id_bengkel',
        'periode_awal',
        'periode_akhir',
        'tahun_periode',
        'total_pendapatan_jasa',
        'total_pendapatan_penjualan',
        'total_beban',
        'total_laba',
        'total_rugi'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

}
