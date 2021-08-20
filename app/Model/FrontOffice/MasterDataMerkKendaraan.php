<?php

namespace App\Model\FrontOffice;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class MasterDataMerkKendaraan extends Model
{
    protected $table = "tb_fo_master_merk_kendaraan";

    protected $primaryKey = 'id_merk_kendaraan';

    protected $fillable = [
        'id_jenis_kendaraan', 'merk_kendaraan', 'id_bengkel'
    ];

    protected $hidden = [];

    public $timestamps = false;

    public function jenis_kendaraan()
    {
        return $this->belongsTo(MasterDataJenisKendaraan::class, 'id_jenis_kendaraan', 'id_jenis_kendaraan');
    }

    public static function getId()
    {
        $getId = DB::table('tb_fo_master_merk_kendaraan')->orderBy('id_merk_kendaraan', 'DESC')->take(1)->get();
        if (count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_merk_kendaraan' => 0
            ]
        ];
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
