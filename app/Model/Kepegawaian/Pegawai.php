<?php

namespace App\Model\Kepegawaian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;

    protected $table = "tb_kepeg_master_pegawai";

    protected $primaryKey = 'id_pegawai';

    protected $fillable = [
        'nama_lengkap',
        'id_jabatan',
        'nama_panggilan',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'kota_asal',
        'no_telp',
        'agama',
        'status_perkawinan',
        'email',
        'pendidikan_terakhir',
        'tanggal_masuk',
    ];

    protected $hidden =[ 
    
    ];

    public $timestamps = false;

    public function jabatan(){
        return $this->belongsTo(Jabatan::class,'id_jabatan','id_jabatan');
    }
}
