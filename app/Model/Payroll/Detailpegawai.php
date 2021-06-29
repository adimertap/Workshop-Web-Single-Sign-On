<?php

namespace App\Model\Payroll;

use App\Model\Kepegawaian\Pegawai;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;

class Detailpegawai extends Model
{
    protected $table = "tb_payroll_detpegawai";

    protected $primaryKey = 'id_detail_pegawai';

    protected $fillable = [
        'id_bengkel',
        'id_gaji_pegawai',
        'id_pegawai',
        'total_tunjangan',
        'total_gaji',
        'total_pph21'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function Gaji()
    {
        return $this->belongsTo(Gajipegawai::class, 'id_gaji_pegawai','id_gaji_pegawai');
    }

    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai','id_pegawai');
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
