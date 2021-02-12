<?php

namespace App\Model\Payroll;

use Illuminate\Database\Eloquent\Model;

class Mastertunjangan extends Model
{
    protected $table = "tb_payroll_master_tunjangan";

    protected $primaryKey = 'id_tunjangan';

    protected $fillable = [
        'nama_tunjangan',
        'jumlah_tunjangan',
        'keterangan',
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;

}
