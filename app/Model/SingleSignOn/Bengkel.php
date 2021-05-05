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
        'alamat_bengkel'
    ];

    public $timestamps = false;
}
