<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Rak extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_master_rak";

    protected $primaryKey = 'id_rak';

    protected $fillable = [
        'kode_rak',
        'nama_rak',
        'jenis_rak',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_inventory_master_rak')->orderBy('id_rak','DESC')->take(1)->get();

    }
}
