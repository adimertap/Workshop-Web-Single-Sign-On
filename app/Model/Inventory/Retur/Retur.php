<?php

namespace App\Model\Inventory\Retur;

use App\Model\Accounting\Akun;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retur extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_retur";

    protected $primaryKey = 'id_retur';

    protected $fillable = [
        'id_rcv',
        'id_pegawai',
        'id_supplier',
        'id_akun',
        'kode_retur',
        'no_faktur',
        'tanggal_retur',
        'status',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detail()
    {
        return $this->hasMany(Returdetail::class,'id_retur');
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
}
