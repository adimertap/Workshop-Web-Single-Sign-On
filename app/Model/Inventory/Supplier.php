<?php

namespace App\Model\Inventory;

use App\Model\Accounting\Payable\InvoicePayable;
use App\Scopes\OwnershipScope;
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
        'id_bengkel',
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
    
    // public function Sparepart()
    // {
    //     return $this->belongsToMany(Sparepart::class,'tb_inventory_master_harga_sparepart','id_supplier','id_sparepart')->withPivot('harga_jual');
    // }

    public function Sparepart()
    {
        return $this->hasMany(Sparepart::class, 'id_supplier','id_supplier');
    }
    
    public function MasterHarga()
    {
        return $this->belongsTo(Hargasparepart::class, 'id_supplier');
    }

    public function InvoicePayable()
    {
        return $this->hasMany(InvoicePayable::class, 'id_supplier')->where('status_prf', 'Belum Dibuat');
    }

    public function InvoiceEdit()
    {
        return $this->hasMany(InvoicePayable::class, 'id_supplier');
    }

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        $getId = DB::table('tb_inventory_master_supplier')->orderBy('id_supplier','DESC')->take(1)->get();
        if(count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_supplier'=> 0
            ]
            ];
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

}
