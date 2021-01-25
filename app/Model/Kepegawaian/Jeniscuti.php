<?php

namespace App\Model\Kepegawaian;

use Illuminate\Database\Eloquent\Model;

class Jeniscuti extends Model
{
    protected $table = "tb_kepeg_master_jenis_cuti";

    protected $primaryKey = 'id_jenis_cuti';

    protected $fillable = [
        'nama_cuti',
        'jumlah_hari',
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;
}
