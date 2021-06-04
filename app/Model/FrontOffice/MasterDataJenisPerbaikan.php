<?php

namespace App\Model\FrontOffice;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterDataJenisPerbaikan extends Model
{
    protected $table = "tb_fo_master_jenis_perbaikan";

    protected $primaryKey = 'id_jenis_perbaikan';

    protected $fillable = [
        'kode_jenis_perbaikan', 'nama_jenis_perbaikan', 'group_jenis_perbaikan', 'harga_jenis_perbaikan', 'id_bengkel'
    ];

    protected $hidden = [];

    public $timestamps = false;

    public static function getId()
    {
        return $getId = DB::table('tb_fo_master_jenis_perbaikan')->orderBy('id_jenis_perbaikan', 'DESC')->take(1)->get();
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
