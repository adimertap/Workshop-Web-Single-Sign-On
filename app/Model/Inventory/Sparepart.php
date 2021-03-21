<?php

namespace App\Model\Inventory;

use App\Model\Inventory\Purchase\PO;
use App\Model\Inventory\Purchase\POdetail;
use App\Model\Inventory\Stockopname\Opname;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sparepart extends Model
{
    protected $table = "tb_inventory_master_sparepart";

    protected $primaryKey = 'id_sparepart';

    protected $fillable = [
        'id_merk',
        'id_jenis_sparepart',
        'id_konversi',
        'id_rak',
        'kode_sparepart',
        'nama_sparepart',
        'keterangan',
        'stock',
        'stock_min'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;

    public function Jenissparepart(){
        return $this->belongsTo(Jenissparepart::class,'id_jenis_sparepart','id_jenis_sparepart');
    }

    public function Merksparepart(){
        return $this->belongsTo(Merksparepart::class,'id_merk','id_merk');
    }

    public function Konversi(){
        return $this->belongsTo(Konversi::class,'id_konversi','id_konversi');
    }

    public function Rak(){
        return $this->belongsTo(Rak::class,'id_rak','id_rak');
    }

    public function Gallery(){
        return $this->hasMany(Gallery::class,'id_sparepart');
    }

    public function Hargasparepart(){
        return $this->hasOne(Hargasparepart::class,'id_sparepart');
    }

    public function PO(){
        return $this->belongsToMany(PO::class, 'tb_inventory_detpo','id_sparepart','id_po');
    }

    public function Opname(){
        return $this->belongsToMany(Opname::class, 'tb_inventory_detopname','id_sparepart','id_opname');
    }

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_inventory_master_sparepart')->orderBy('id_sparepart','DESC')->take(1)->get();

    }
}
