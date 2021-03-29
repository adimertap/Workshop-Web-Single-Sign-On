<?php

namespace App\Model\Inventory\Purchase;

use App\Model\Accounting\Akun;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class PO extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_po";

    protected $primaryKey = 'id_po';

    protected $fillable = [
        'kode_po',
        'id_pegawai',
        'id_akun',
        'id_supplier',
        'tanggal_po',
        'approve_po',
        'approve_ap',
        'status',
        'keterangan_owner',
        'keterangan_ap',
        
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detailsparepart()
    {
        return $this->belongsToMany(Sparepart::class,'tb_inventory_detpo','id_po','id_sparepart')->withPivot('qty');
    }

    public function Akun()
    {
        return $this->belongsTo(Akun::class,'id_akun','id_akun');
    }

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class,'id_supplier','id_supplier');
    }

    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    }

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_inventory_po')->orderBy('id_po','DESC')->take(1)->get();

    }
}
