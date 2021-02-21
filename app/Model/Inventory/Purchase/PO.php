<?php

namespace App\Model\Inventory\Purchase;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PO extends Model
{

    use SoftDeletes;

    protected $table = "tb_inventory_po";

    protected $primaryKey = 'id_po';

    protected $fillable = [
        'id_pegawai',
        'id_akun',
        'id_supplier',
        'kode_po',
        'tanggal_po',
        'approve_po',
        'approve_ap',
        'keterangan'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;
}
