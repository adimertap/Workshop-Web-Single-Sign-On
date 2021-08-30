<?php

namespace App\Model\Inventory;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konversi extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_master_konversi";

    protected $primaryKey = 'id_konversi';

    protected $fillable = [
        'satuan',
        'id_bengkel'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = false;

}
