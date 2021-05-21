<?php

namespace App\Model\Inventory\Purchase;

use App\Model\Accounting\Akun;
use App\Model\Inventory\Hargasparepart;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use App\Scopes\OwnershipScope;
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
        'id_bengkel',
        'id_pegawai',
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
        return $this->belongsToMany(Sparepart::class,'tb_inventory_detpo','id_po','id_sparepart')->withPivot('qty','qty_po_sementara','harga_satuan','total_harga','id_bengkel');
    }

    public function Hargasparepart()
    {
        return $this->belongsTo(Hargasparepart::class,'id_harga','id_harga');
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
        $getId = DB::table('tb_inventory_po')->orderBy('id_po','DESC')->take(1)->get();
        if(count($getId) > 0) return $getId;
         return (object)[
             (object)[
                 'id_po'=> 0
             ]
             ];
    }

    public static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

    
    // public function SupplierBaru()
    // {
    //     return $this->belongsTo(Supplier::class,'id_supplier','id_supplier');
    // }

}
