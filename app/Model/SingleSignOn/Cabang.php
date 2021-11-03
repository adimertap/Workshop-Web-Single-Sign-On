<?php

namespace App\Model\SingleSignOn;

use App\Scopes\OwnershipScope;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cabang extends Model
{
    protected $table = "tb_marketplace_cabang";

    protected $primaryKey = 'id_cabang';

    protected $fillable = [
        'nama_cabang',
        'id_bengkel',
        'latitude',
        'longitude',
        'alamat_cabang',
        'id_desa',
    ];

    public $timestamps = false;

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class, 'id_bengkel', 'id_bengkel');
    }

    public function scopeOwnership($query)
    {
        return $query->where('id_bengkel', '=', Auth::user()->id_bengkel);
    }
}
