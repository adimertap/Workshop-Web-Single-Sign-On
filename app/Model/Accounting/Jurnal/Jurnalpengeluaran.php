<?php

namespace App\Model\Accounting\Jurnal;

use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\Payable\InvoicePayable;
use App\Model\Accounting\Payable\Pajak;
use App\Model\Accounting\Prf\Prf;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurnalpengeluaran extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_jurnal_pengeluaran";

    protected $primaryKey = 'id_jurnal_pengeluaran';

    protected $fillable = [
        'id_bengkel',
        'id_jenis_transaksi',
        'id_payable_invoice',
        'id_prf',
        'id_pajak',
        'ref',
        'grand_total',
        'keterangan',
        'tanggal_jurnal'
    ];

    protected $hidden =[ 
        'deleted_at'
    ];

    public function Jenistransaksi()
    {
        return $this->belongsTo(Jenistransaksi::class,'id_jenis_transaksi','id_jenis_transaksi');
    }

    public function Invoicepayable()
    {
        return $this->belongsTo(InvoicePayable::class,'id_payable_invoice','id_payable_invoice');
    }

    public function Prf()
    {
        return $this->belongsTo(Prf::class,'id_prf','id_prf');
    }

    public function Pajak()
    {
        return $this->belongsTo(Pajak::class,'id_pajak','id_pajak');
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }


}
