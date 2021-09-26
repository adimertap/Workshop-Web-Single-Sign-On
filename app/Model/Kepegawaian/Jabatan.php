<?php

namespace App\Model\Kepegawaian;

use App\Model\Payroll\Mastergajipokok;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    use SoftDeletes;

    protected $table = "tb_kepeg_master_jabatan";

    protected $primaryKey = 'id_jabatan';

    protected $fillable = [
        'nama_jabatan',
        'id_gaji_pokok'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Gajipokok()
    {
        return $this->hasOne(Mastergajipokok::class, 'id_jabatan');
    }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_jabatan');
    }

}
