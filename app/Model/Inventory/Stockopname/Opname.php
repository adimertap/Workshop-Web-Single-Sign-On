<?php

namespace App\Model\Inventory\Stockopname;

use App\Model\Inventory\Sparepart;
use App\Model\Kepegawaian\Pegawai;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Opname extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_opname";

    protected $primaryKey = 'id_opname';

    protected $fillable = [
        'id_pegawai',
        'kode_opname',
        'tanggal_opname',
        'keterangan',
        'approve',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detailsparepart()
    {
        return $this->belongsToMany(Sparepart::class,'tb_inventory_detopname','id_opname','id_sparepart')->withPivot('jumlah_real','keterangan_detail');
    }

    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    }
    
    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
         $getId = DB::table('tb_inventory_opname')->orderBy('id_opname','DESC')->take(1)->get();
         if(count($getId) > 0) return $getId;
         return (object)[
             (object)[
                 'id_opname'=> 0
             ]
             ];
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
