<?php

namespace App\Model\Accounting\Payable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pajakdetail extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_detpajak";

    protected $primaryKey = 'id_detail_pajak';

    protected $fillable = [
        'id_pajak',
        'data_pajak',
        'nilai_pajak',
        'keterangan_pajak'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function pajak()
    {
        return $this->belongsTo(Pajak::class, 'id_pajak','id_pajak');
    }
}
