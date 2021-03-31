<?php

namespace App\Model\Kepegawaian;

use App\Model\Payroll\Mastergajipokok;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    use SoftDeletes;

    protected $table = "tb_kepeg_master_jabatan";

    protected $primaryKey = 'id_jabatan';

    protected $fillable = [
        'nama_jabatan',
        'id_gaji_pokok'
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;

    public function Gajipokok(){
        return $this->belongsTo(Mastergajipokok::class,'id_gaji_pokok','id_gaji_pokok');
    }
}
