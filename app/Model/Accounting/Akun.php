<?php

namespace App\Model\Accounting;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = "tb_accounting_master_akun";

    protected $primaryKey = 'id_akun';

    protected $fillable = [
        // 'id_bengkel',
        'id_akun_induk',
        'kode_akun',
        'nama_akun',
        'akun_grup',
        'level_akun',
        'status_akun',
        'nama_akun_induk',
        'kode_akun_induk',

    ];

    protected $hidden =[ 
        'deleted_at'
    ];

    public $timestamps = false;

    // protected static function booted()
    // {
    //     static::addGlobalScope(new OwnershipScope);
    // }

}
