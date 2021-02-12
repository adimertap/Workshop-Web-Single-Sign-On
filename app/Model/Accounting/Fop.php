<?php

namespace App\Model\Accounting;

use Illuminate\Database\Eloquent\Model;

class Fop extends Model
{
    protected $table = "tb_accounting_master_fop";

    protected $primaryKey = 'id_fop';

    protected $fillable = [
        'nama_fop',
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;
}
