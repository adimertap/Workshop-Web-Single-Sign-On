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
    ];

    protected $hidden =[ 
        'deleted_at'
    ];

    public $timestamps = true;

    public function DetailPenentuanAkun()
    {
        return $this->belongsToMany(Akun::class, 'tb_accounting_master_penentuan_akun', 'id_jenis_transaksi', 'id_akun');
    }

    public function PenentuanAkun()
    {
        return $this->hasOne(PenentuanAkun::class,'id_jenis_transaksi','id_jenis_transaksi');
    }

}
