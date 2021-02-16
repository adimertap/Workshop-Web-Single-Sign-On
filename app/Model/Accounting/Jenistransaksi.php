<?php

namespace App\Model\Accounting;

use Illuminate\Database\Eloquent\Model;

class Jenistransaksi extends Model
{
    protected $table = "tb_accounting_master_jenis_transaksi";

    protected $primaryKey = 'id_jenis_transaksi';

    protected $fillable = [
        'nama_transaksi',
        'id_akun',
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;

    public function akun(){
        return $this->belongsTo(Akun::class,'id_akun','id_akun');
    }
}
