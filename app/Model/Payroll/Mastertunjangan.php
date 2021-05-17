<?php

namespace App\Model\Payroll;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mastertunjangan extends Model
{
    use SoftDeletes;

    protected $table = "tb_payroll_master_tunjangan";

    protected $primaryKey = 'id_tunjangan';

    protected $fillable = [
        'nama_tunjangan',
        'jumlah_tunjangan',
        'keterangan',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Gaji(){
        return $this->belongsToMany(Gajipegawai::class, 'tb_payroll_detgaji','id_tunjangan','id_gaji_pegawai');
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
    

}
