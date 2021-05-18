<?php

namespace App\Model\Accounting;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = "tb_accounting_master_akun";

    protected $primaryKey = 'id_akun';

    protected $fillable = [
        'kode_akun',
        'id_bengkel',
        'nama_akun',
        'akun_grup'
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
