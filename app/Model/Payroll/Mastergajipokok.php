<?php

namespace App\Model\Payroll;

use App\Model\Kepegawaian\Jabatan;
use Illuminate\Database\Eloquent\Model;

class Mastergajipokok extends Model
{
    protected $table = "tb_payroll_master_gaji_pokok";

    protected $primaryKey = 'id_gaji_pokok';

    protected $fillable = [
        'id_jabatan',
        'besaran_gaji',
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;

    public function Jabatan(){
        return $this->belongsTo(Jabatan::class,'id_jabatan','id_jabatan');
    }
}
