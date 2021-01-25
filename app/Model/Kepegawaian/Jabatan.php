<?php

namespace App\Model\Kepegawaian;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = "tb_kepeg_master_jabatan";

    protected $primaryKey = 'id_jabatan';

    protected $fillable = [
        'nama_jabatan',
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;
}
