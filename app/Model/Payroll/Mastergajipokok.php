<?php

namespace App\Model\Payroll;

use App\Model\Kepegawaian\Jabatan;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mastergajipokok extends Model
{
    use SoftDeletes;

    protected $table = "tb_payroll_master_gaji_pokok";

    protected $primaryKey = 'id_gaji_pokok';

    protected $fillable = [
        'id_jabatan',
        'besaran_gaji',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Jabatan(){
        return $this->belongsTo(Jabatan::class,'id_jabatan','id_jabatan')->withTrashed();
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
