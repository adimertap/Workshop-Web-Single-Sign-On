<?php

namespace App\Model\Accounting;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenistransaksi extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_master_jenis_transaksi";

    protected $primaryKey = 'id_jenis_transaksi';

    protected $fillable = [
        'nama_transaksi',
        'id_bengkel',
    ];

    protected $hidden =[ 
        'deleted_at'
    ];

    public $timestamps = true;

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

    public function Penentuanakun()
    {
        return $this->hasMany(PenentuanAkun::class,'id_jenis_transaksi');
    }
}
