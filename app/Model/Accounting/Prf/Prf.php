<?php

namespace App\Model\Accounting\Prf;

use App\Model\Accounting\Bankaccount;
use App\Model\Accounting\Fop;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\Payable\InvoicePayable;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Inventory\Rcv\Rcvdetail;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Prf extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_prf";

    protected $primaryKey = 'id_prf';

    protected $fillable = [
        'id_supplier',
        'id_bank_account',
        'id_fop',
        'id_jenis_transaksi',
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
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detailprf()
    {
        return $this->belongsToMany(InvoicePayable::class,'tb_accounting_detprf','id_prf','id_payable_invoice');
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
        return $this->belongsTo(Bankaccount::class,'id_bank_account','id_bank_account');
    }

    public function Jenistransaksi()
    {
        return $this->belongsTo(Jenistransaksi::class,'id_jenis_transaksi','id_jenis_transaksi');
    }
    
    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_accounting_prf')->orderBy('id_prf','DESC')->take(1)->get();
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
