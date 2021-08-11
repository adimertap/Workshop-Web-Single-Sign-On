<?php

namespace App\Model\SingleSignOn;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;

class ManajemenHakAkses extends Model
{
    protected $table = "tb_sso_hak_akses";

    protected $primaryKey = 'id_hak_akses';

    protected $fillable = [
        'nama_hak_akses',
    ];

    public $timestamps = false;

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
