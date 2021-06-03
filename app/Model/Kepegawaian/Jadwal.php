<?php

namespace App\Model\Kepegawaian;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    protected $table = "tb_kepeg_jadwal";

    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'id_bengkel',
        'id_pegawai',
        'start_tanggal',
        'end_tanggal',
        'bulan_jadwal',
        'tahun_jadwal',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;


    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

}
