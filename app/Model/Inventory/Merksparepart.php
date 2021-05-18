<?php

namespace App\Model\Inventory;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Merksparepart extends Model
{

    use SoftDeletes;

    protected $table = "tb_inventory_master_merk_sparepart";

    protected $primaryKey = 'id_merk';

    protected $fillable = [
        'id_jenis_sparepart',
    	'kode_merk',
        'id_bengkel',
    	'merk_sparepart',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'

    ];

    public $timestamps = false;

    // public function Mastermerk(){
    //     return $this->hasMany(Sparepart::class, 'id_merk','id_merk');
    // }

    public function jenissparepart(){
        return $this->belongsTo(Jenissparepart::class,'id_jenis_sparepart','id_jenis_sparepart')->withTrashed();
    }

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        $getId = DB::table('tb_inventory_master_merk_sparepart')->orderBy('id_merk','DESC')->take(1)->get();
        if(count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_merk'=> 0
            ]
            ];
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
