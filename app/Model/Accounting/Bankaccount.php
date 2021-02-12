<?php

namespace App\Model\Accounting;

use Illuminate\Database\Eloquent\Model;

class Bankaccount extends Model
{
    protected $table = "tb_accounting_master_bank_account";

    protected $primaryKey = 'id_bank_account';

    protected $fillable = [
        'nama_bank',
        'nama_account',
        'jenis_account',
        'nomor_rekening',
        'alamat_account'
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;
}
