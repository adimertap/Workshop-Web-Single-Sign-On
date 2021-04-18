<?php

namespace App\Model\Accounting\Payable;

use Illuminate\Database\Eloquent\Model;

class InvoicePayabledetail extends Model
{

    protected $table = "tb_accounting_detinvoice_payable";

    protected $primaryKey = 'id_detinvoice_payable';

    protected $fillable = [
        'id_payable_invoice',
        'id_rcv',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function Rcv()
    {
        return $this->belongsTo(Rcv::class, 'id_rcv','id_rcv');
    }

    public function PayableInvoice()
    {
        return $this->belongsTo(InvoicePayable::class, 'id_payable_invoice','id_payable_invoice');
    }
}
