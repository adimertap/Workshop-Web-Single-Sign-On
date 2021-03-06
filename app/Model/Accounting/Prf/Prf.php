<?php

namespace App\Model\Accounting\Prf;

use App\Model\Accounting\Bankaccount;
use App\Model\Accounting\Fop;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Inventory\Rcv\Rcvdetail;
use App\Model\Inventory\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prf extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_prf";

    protected $primaryKey = 'id_prf';

    protected $fillable = [
        'id_supplier',
        'id_akun_bank',
        'id_fop',
        'kode_prf',
        'tanggal_prf',
        'tanggal_bayar',
        'keperluan_prf',
        'keterangan',
        'status_prf',
        'status_jurnal',
        'total_bayar',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detail()
    {
        return $this->hasMany(Rcv::class,'id_rcv');
    }

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class,'id_supplier','id_supplier');
    }
    
    public function FOP()
    {
        return $this->belongsTo(Fop::class,'id_fop','id_fop');
    }

    public function Akunbank()
    {
        return $this->belongsTo(Bankaccount::class,'id_akun_bank','id_bank_account');
    }

    public function Jenistransaksi()
    {
        return $this->belongsTo(Jenistransaksi::class,'id_jenis_transaksi','id_jenis_transaksi');
    }
}
