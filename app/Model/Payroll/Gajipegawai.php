<?php

namespace App\Model\Payroll;

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
        'bulan_gaji',
        'tahun_gaji',
        'gaji_diterima',
        'keterangan',
        'status_diterima'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detailtunjangan()
    {
        return $this->belongsToMany(Mastertunjangan::class,'tb_payroll_det_gaji','id_gaji_pegawai','id_tunjangan');
    }

    public function Pegawai(){
        return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    }

}
