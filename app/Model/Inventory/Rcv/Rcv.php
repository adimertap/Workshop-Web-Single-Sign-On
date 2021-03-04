<?php

namespace App\Model\Inventory\Rcv;

use App\Model\Accounting\Akun;
use App\Model\Accounting\Fop;
use App\Model\Inventory\Purchase\PO;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rcv extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_rcv";

    protected $primaryKey = 'id_rcv';

    protected $fillable = [
        'id_po',
        'id_pegawai',
        'id_supplier',
        'id_akun',
        'id_fop',
        'kode_rcv',
        'no_do',
        'no_faktur',
        'status',
        'tanggal_rcv',
        'total_pembayaran',
        'status_bayar'
        
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

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

    public function Akun()
    {
        return $this->belongsTo(Akun::class,'id_akun','id_akun');
    }

    public function FOP()
    {
        return $this->belongsTo(Fop::class,'id_fop','id_fop');
    }

    

   
}
