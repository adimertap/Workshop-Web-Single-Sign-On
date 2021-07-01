<?php

namespace App\Model\Accounting\Jurnal;

use App\Model\Accounting\Jenistransaksi;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurnalpenerimaan extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_jurnal_penerimaan";

    protected $primaryKey = 'id_jurnal_penerimaan';

    protected $fillable = [
        'id_bengkel',
        'id_jenis_transaksi',
        'tanggal_transaksi',
        'kode_transaksi',
        'ref',
        'grand_total',
        'keterangan',
        'tanggal_jurnal',
        'jenis_jurnal'
    ];

    protected $hidden =[ 
        'deleted_at'
    ];


    public function Jenistransaksi()
    {
        return $this->belongsTo(Jenistransaksi::class,'id_jenis_transaksi','id_jenis_transaksi');
    }

    

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }


}
