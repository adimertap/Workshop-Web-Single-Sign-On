<?php

namespace App\Model\Accounting\Payable;

use App\Model\Inventory\Sparepart;
use Illuminate\Database\Eloquent\Model;

class InvoicePayabledetail extends Model
{

    protected $table = "tb_accounting_detinvoice_payable";

    protected $primaryKey = 'id_detinvoice_payable';

    protected $fillable = [
        'id_payable_invoice',
        'id_sparepart',
        'qty_rcv',
        'harga_item',
        'total_harga'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function Sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'id_sparepart','id_sparepart');
    }

    public function PayableInvoice()
    {
        return $this->belongsTo(InvoicePayable::class, 'id_payable_invoice','id_payable_invoice');
    }
}
