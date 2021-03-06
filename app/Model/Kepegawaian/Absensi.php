<?php

namespace App\Model\Kepegawaian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absensi extends Model
{
    use SoftDeletes;

    protected $table = "tb_kepeg_absensi";

    protected $primaryKey = 'id_absensi';

    protected $fillable = [
        'id_pegawai',
        'tanggal_absensi',
        'absensi',
        'keterangan',
        'jam_masuk',
        'jam_pulang',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;


    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    }

}
