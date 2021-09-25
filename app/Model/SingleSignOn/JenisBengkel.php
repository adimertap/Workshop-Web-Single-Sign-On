<?php

namespace App\Model\SingleSignOn;

use Illuminate\Database\Eloquent\Model;

class JenisBengkel extends Model
{
    protected $table = "tb_marketplace_jenis_bengkel";

    protected $primaryKey = 'id_jenis_bengkel';

    protected $fillable = [
        'nama_jenis_bengkel',
    ];

    public $timestamps = false;
}
