<?php

namespace App\Model\Kepegawaian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    use SoftDeletes;

    protected $table = "tb_kepeg_master_jabatan";

    protected $primaryKey = 'id_jabatan';

    protected $fillable = [
        'nama_jabatan',
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;
}
