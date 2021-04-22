<?php

namespace App\Model\Inventory\Kartugudang;

use App\Model\Inventory\Rcv\Rcv;
use App\Model\Inventory\Retur\Retur;
use App\Model\Inventory\Sparepart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kartugudang extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_kartu_gudang";

    protected $primaryKey = 'id_kartu_gudang';

    protected $fillable = [
        'id_sparepart',
        'id_rcv',
        'id_retur',
        'saldo_awal',
        'tanggal_transaksi',
        'jumlah_masuk',
        'jumlah_keluar',
        'saldo_akhir',
        'jenis_kartu'
        
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;


    public function Sparepart()
    {
        return $this->belongsTo(Sparepart::class,'id_sparepart','id_sparepart');
    }


    public function Rcv()
    {
        return $this->belongsTo(Rcv::class,'id_rcv','id_rcv');
    }

    public function Retur()
    {
        return $this->belongsTo(Retur::class,'id_retur','id_retur');
    }
}
