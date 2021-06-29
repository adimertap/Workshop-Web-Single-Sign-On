<?php

namespace App\Model\Accounting;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenentuanAkun extends Model
{

    protected $table = "tb_accounting_master_penentuan_akun";

    protected $primaryKey = 'id_penentuan_akun';

    protected $fillable = [
        'id_akun',
        'id_pasangan_akun',
        'id_jenis_transaksi',
        'id_bengkel',
    ];

    protected $hidden =[ 
       
    ];

    public $timestamps = true;

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

    // DEBET
    public function Akun()
    {
        return $this->belongsTo(Akun::class,'id_akun','id_akun');
    }

    // KREDIT
    public function PasanganAkun()
    {
        return $this->belongsTo(Akun::class,'id_pasangan_akun','id_akun');
    }

    public function Jenistransaksi()
    {
        return $this->belongsTo(Jenistransaksi::class,'id_jenis_transaksi','id_jenis_transaksi');
    }

}
