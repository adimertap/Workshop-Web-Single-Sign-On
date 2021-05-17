<?php

namespace App\Model\Accounting;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Fop extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_master_fop";

    protected $primaryKey = 'id_fop';

    protected $fillable = [
        'nama_fop',
        'kode_fop',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_accounting_master_fop')->orderBy('id_fop','DESC')->take(1)->get();
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
