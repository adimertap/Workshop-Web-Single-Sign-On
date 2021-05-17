<?php

namespace App\Model\Inventory\Rcv;

use App\Model\Accounting\Akun;
use App\Model\Accounting\Fop;
use App\Model\Inventory\Purchase\PO;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Rcv extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_rcv";

    protected $primaryKey = 'id_rcv';

    protected $fillable = [
        'id_po',
        'id_pegawai',
        'id_supplier',
        'kode_rcv',
        'no_do',
        'status',
        'tanggal_rcv',
        'grand_total',
        'status_bayar'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detailrcv()
    {
        return $this->belongsToMany(Sparepart::class,'tb_inventory_detrcv','id_rcv','id_sparepart')->withPivot('qty_po','qty_rcv','keterangan','harga_diterima','total_harga');
    }

    public function Kartugudang()
    {
        return $this->belongsToMany(Sparepart::class,'tb_inventory_kartu_gudang','id_rcv','id_sparepart');
    }

    public function Detail()
    {
        return $this->hasMany(Rcvdetail::class,'id_rcv');
    }

    public function PO()
    {
        return $this->belongsTo(PO::class,'id_po','id_po');
    }

    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    }

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class,'id_supplier','id_supplier');
    }

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_inventory_rcv')->orderBy('id_rcv','DESC')->take(1)->get();
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

   
}
