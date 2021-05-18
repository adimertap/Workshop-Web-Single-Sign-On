<?php

namespace App\Model\Accounting\Prf;

use App\Model\Accounting\Payable\InvoicePayable;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;

class PrfDetail extends Model
{
    protected $table = "tb_accounting_detprf";

    protected $primaryKey = 'id_detail_prf';

    protected $fillable = [
        'id_prf',
        'id_bengkel',
        'id_payable_invoice',
        'total_pembayaran',
    ];

    protected $hidden =[ 
       
    ];

    public $timestamps = true;

    public function Invoice()
    {
        return $this->belongsTo(InvoicePayable::class, 'id_payable_invoice','id_payable_invoice');
    }

    public function Prf()
    {
        return $this->belongsTo(Prf::class, 'id_prf','id_prf');
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
