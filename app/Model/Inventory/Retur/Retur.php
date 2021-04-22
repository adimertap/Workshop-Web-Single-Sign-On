<?php

namespace App\Model\Inventory\Retur;

use App\Model\Accounting\Akun;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Retur extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_retur";

    protected $primaryKey = 'id_retur';

    protected $fillable = [
        'id_rcv',
        'id_pegawai',
        'id_supplier',
        'kode_retur',
        'tanggal_retur',
        'status',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detailretur()
    {
        return $this->belongsToMany(Sparepart::class,'tb_inventory_detretur','id_retur','id_sparepart')->withPivot('qty_retur','keterangan');
    }

    public function Rcv()
    {
        return $this->belongsTo(Rcv::class,'id_rcv','id_rcv');
    }

    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    }

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class,'id_supplier','id_supplier');
    }

    public function Akun()
    {
        return $this->belongsTo(Akun::class,'id_akun','id_akun');
    }    

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_inventory_retur')->orderBy('id_retur','DESC')->take(1)->get();

    }
}
