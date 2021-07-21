<?php

namespace App\Model\Accounting;

use App\Model\Accounting\Jurnal\Jurnalpenerimaan;
use App\Model\Accounting\Jurnal\Jurnalpengeluaran;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;

class LaporanlabarugiDetail extends Model
{
    protected $table = "tb_accounting_detlaporan_laba_rugi";

    protected $primaryKey = 'id_detlaporan';

    protected $fillable = [
        'id_laporan',
        'id_bengkel',
        'id_akun',
        'id_jurnal_pengeluaran',
        'id_jurnal_penerimaan',
        'jumlah',
        'jenis_transaksi'
    ];

    protected $hidden =[ 
       
    ];

    public $timestamps = true;

    public function JurnalPengeluaran()
    {
        return $this->belongsTo(Jurnalpengeluaran::class, 'id_jurnal_pengeluaran','id_jurnal_pengeluaran');
    }

    public function JurnalPenerimaan()
    {
        return $this->belongsTo(Jurnalpenerimaan::class, 'id_jurnal_penerimaan','id_jurnal_penerimaan');
    }

    public function Akun()
    {
        return $this->belongsTo(Akun::class, 'id_akun','id_akun');
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
