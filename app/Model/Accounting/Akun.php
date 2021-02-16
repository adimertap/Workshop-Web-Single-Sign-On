<?php

namespace App\Model\Accounting;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = "tb_accounting_master_akun";

    protected $primaryKey = 'id_akun';

    protected $fillable = [
        'kode_akun',
        'nama_akun',
        'akun_grup',
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;
}
