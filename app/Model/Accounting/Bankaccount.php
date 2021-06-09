<?php

namespace App\Model\Accounting;

use App\Bank;
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
        'id_bank',
        'id_bengkel',
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

    public function Bank()
    {
        return $this->belongsTo(Bank::class,'id_bank','id_bank');
    }



    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        $getId = DB::table('tb_accounting_master_bank_account')->orderBy('id_bank_account','DESC')->take(1)->get();
        if(count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_bank_account'=> 0
            ]
            ];

    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
