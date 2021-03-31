<?php

namespace App\Model\Payroll;

use App\Model\Accounting\Akun;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gajipegawai extends Model
{
    use SoftDeletes;

    protected $table = "tb_payroll_perhitungan_gaji";

    protected $primaryKey = 'id_gaji_pegawai';

    protected $fillable = [
        'id_pegawai',
        'id_akun',
        'kode_bayar',
        'bulan_gaji',
        'tahun_gaji',
        'keterangan',
        'status'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detailgaji()
    {
        return $this->belongsToMany(Pegawai::class,'tb_payroll_detgaji','id_gaji_pegawai','id_pegawai');
    }

    public function Pegawai(){
        return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    }

    public function Akun(){
        return $this->belongsTo(Akun::class,'id_akun','id_akun');
    }


}
