<?php

namespace App\Model\Kepegawaian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;

    protected $table = "tb_kepeg_jadwal";

    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'id_pegawai',
        'tanggal_jadwal',
        'bulan_jadwal',
        'tahun_jadwal',
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
