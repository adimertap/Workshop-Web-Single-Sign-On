<?php

namespace App\Model\Payroll;

use App\Model\Kepegawaian\Pegawai;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detailtunjangan extends Model
{
   
    protected $table = "tb_payroll_detail_tunjangan";

    protected $primaryKey = 'id_detgaji';

    protected $fillable = [
        'id_bengkel',
        'id_gaji_pegawai',
        'id_tunjangan',
        'id_pegawai'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Gaji()
    {
        return $this->belongsTo(Gajipegawai::class, 'id_gaji_pegawai','id_gaji_pegawai');
    }

    public function Tunjangan()
    {
        return $this->belongsTo(Mastertunjangan::class, 'id_tunjangan','id_tunjangan');
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
