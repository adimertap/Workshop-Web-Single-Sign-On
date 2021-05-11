<?php

namespace App\Model\Kepegawaian;

use App\Model\Payroll\Mastergajipokok;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Pegawai extends Model
{
    use SoftDeletes;

    protected $table = "tb_kepeg_master_pegawai";

    protected $primaryKey = 'id_pegawai';

    protected $fillable = [
        'id_jabatan',
        'nama_pegawai',
        'nama_panggilan',
        'kode_pegawai',
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
        return $this->belongsTo(Jabatan::class,'id_jabatan','id_jabatan')->withTrashed();
    }

    public function absensi(){
        return $this->hasMany(Absensi::class,'id_pegawai');
    }
   
    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_kepeg_master_pegawai')->orderBy('id_pegawai','DESC')->take(1)->get();

    }

}
