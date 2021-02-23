<?php

namespace App\Model\Inventory\Rcv;

use App\Model\Inventory\Rak;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rcvdetail extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_detrcv";

    protected $primaryKey = 'id_detail_rcv';

    protected $fillable = [
        'id_rcv',
        'id_sparepart',
        'id_rak',
        'jumlah_po',
        'jumlah_rcv',
        'total_pembayaran',

    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Rcv()
    {
        return $this->belongsTo(Rcv::class, 'id_rcv','id_rcv');
    }

    public function Sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'id_sparepart','id_sparepart');
    }

    public function Rak()
    {
        return $this->belongsTo(Rak::class, 'id_rak','id_rak');
    }
}
