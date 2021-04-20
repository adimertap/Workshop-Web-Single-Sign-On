<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    use SoftDeletes;

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
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Sparepart()
    {
        return $this->belongsToMany(Sparepart::class,'tb_inventory_master_harga_sparepart','id_supplier','id_sparepart')->withPivot('harga_beli','harga_jual');

    }

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_inventory_master_supplier')->orderBy('id_supplier','DESC')->take(1)->get();

    }

}
