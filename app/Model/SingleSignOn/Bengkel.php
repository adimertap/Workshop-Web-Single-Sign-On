<?php

namespace App\Model\SingleSignOn;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    protected $table = "tb_marketplace_bengkel";

    protected $primaryKey = 'id_bengkel';

    protected $fillable = [
        'nama_bengkel',
        'alamat_bengkel',
        'longitude',
        'latitude',
        'slug',
        'nohp_bengkel',
        'logo_bengkel',
        'jam_masuk_kerja',
        'jam_keluar_kerja'
    ];

    public $timestamps = false;
}
