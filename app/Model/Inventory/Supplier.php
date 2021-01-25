<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "tb_inventory_master_supplier";

    protected $primaryKey = 'id_supplier';

    protected $fillable = [
    	'kode_supplier',
        'nama_supplier',
        'telephone',
        'alamat_supplier',
        'rekening_supplier',
        'email',
        'kode_pos',
        'nama_sales',
    ];

    protected $hidden =[ 

    ];

    public $timestamps = false;

}
