<?php

namespace App\Model\Accounting;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Akun extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_master_akun";

    protected $primaryKey = 'id_akun';

    protected $fillable = [
        // 'id_bengkel',
        'kode_akun',
        'nama_akun',
        'nama_akun_induk',
        'kode_akun_induk',
        'super_level_akun',
        'moderate_level_akun',
        'kode_akun_terakhir',
        'akun_grup',
        'level_akun',
        'status_akun',

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
