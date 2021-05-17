<?php

namespace App\Model\Payroll;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detailgaji extends Model
{
   
    protected $table = "tb_payroll_detgaji";

    protected $primaryKey = 'id_detgaji';

    protected $fillable = [
        'id_gaji_pegawai',
        'id_tunjangan',
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

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
