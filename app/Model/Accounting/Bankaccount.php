<?php

namespace App\Model\Accounting;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Bankaccount extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_master_bank_account";

    protected $primaryKey = 'id_bank_account';

    protected $fillable = [
        'nama_bank',
        'kode_bank',
        'nama_account',
        'jenis_account',
        'nomor_rekening',
        'alamat_account'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_accounting_master_bank_account')->orderBy('id_bank_account','DESC')->take(1)->get();

    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
