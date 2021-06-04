<?php

namespace App\Model\FrontOffice;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterDataPitstop extends Model
{
    protected $table = "tb_fo_master_pitstop";

    protected $primaryKey = 'id_pitstop';

    protected $fillable = [
        'nama_pitstop', 'kode_pitstop', 'id_bengkel'
    ];

    protected $hidden = [];

    public $timestamps = false;

    public static function getId()
    {
        return $getId = DB::table('tb_fo_master_pitstop')->orderBy('id_pitstop', 'DESC')->take(1)->get();
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
