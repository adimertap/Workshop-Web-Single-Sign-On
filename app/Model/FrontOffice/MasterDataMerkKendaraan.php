<?php

namespace App\Model\FrontOffice;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterDataMerkKendaraan extends Model
{
    protected $table = "tb_fo_master_merk_kendaraan";

    protected $primaryKey = 'id_merk_kendaraan';

    protected $fillable = [
        'id_jenis_kendaraan', 'merk_kendaraan'
    ];

    protected $hidden = [];

    public $timestamps = false;

    public function jenis_kendaraan()
    {
        return $this->belongsTo(MasterDataJenisKendaraan::class, 'id_jenis_kendaraan', 'id_jenis_kendaraan');
    }

    public static function getId()
    {
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_fo_master_merk_kendaraan')->orderBy('id_merk_kendaraan', 'DESC')->take(1)->get();
    }
}
