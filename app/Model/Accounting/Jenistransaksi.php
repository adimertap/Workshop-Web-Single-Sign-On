<?php

namespace App\Model\Accounting;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;

class Jenistransaksi extends Model
{
    protected $table = "tb_accounting_master_jenis_transaksi";

    protected $primaryKey = 'id_jenis_transaksi';

    protected $fillable = [
        'nama_transaksi',
        'id_bengkel',
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
