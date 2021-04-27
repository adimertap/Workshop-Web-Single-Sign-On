<?php

namespace App\Model\Accounting\Payable;

use App\Model\Accounting\Jenistransaksi;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class InvoicePayable extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_invoice_payable";

    protected $primaryKey = 'id_payable_invoice';

    protected $fillable = [
        'id_supplier',
        'id_rcv',
        'id_jenis_transaksi',
        'id_pegawai',
        'kode_invoice',
        'tanggal_invoice',
        'tenggat_invoice',
        'deskripsi_invoice',
        'total_pembayaran',
        'status_prf',
        'status_jurnal'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detailinvoice()
    {
        return $this->belongsToMany(Sparepart::class,'tb_accounting_detinvoice_payable','id_payable_invoice','id_sparepart');
    }

    public function Detail()
    {
        return $this->hasMany(InvoicePayabledetail::class,'id_payable_invoice');
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

    public function Jenistransaksi()
    {
        return $this->belongsTo(Jenistransaksi::class,'id_jenis_transaksi','id_jenis_transaksi');
    }

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_accounting_invoice_payable')->orderBy('id_payable_invoice','DESC')->take(1)->get();

    }

}
