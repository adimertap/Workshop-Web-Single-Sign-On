<?php

namespace App\Model\FrontOffice;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterDataKendaraan extends Model
{
    protected $table = "tb_fo_master_kendaraan";

    protected $primaryKey = 'id_kendaraan';

    protected $fillable = [
        'kode_kendaraan', 'nama_kendaraan', 'warna_kendaraan', 'id_merk_kendaraan', 'id_jenis_kendaraan'
    ];

    protected $hidden = [];

    public $timestamps = false;

    public function merk_kendaraan()
    {
        return $this->belongsTo(MasterDataMerkKendaraan::class, 'id_merk_kendaraan', 'id_merk_kendaraan');
    }

    public function jenis_kendaraan()
    {
        return $this->belongsTo(MasterDataJenisKendaraan::class, 'id_jenis_kendaraan', 'id_jenis_kendaraan');
    }

    public static function getId()
    {
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_fo_master_kendaraan')->orderBy('id_kendaraan', 'DESC')->take(1)->get();
    }
}
