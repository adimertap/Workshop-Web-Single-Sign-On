<?php

namespace App\Model\Inventory\Stockopname;

use App\Model\Kepegawaian\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opname extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_opname";

    protected $primaryKey = 'id_opname';

    protected $fillable = [
        'id_pegawai',
        'kode_opname',
        'tanggal_opname',
        'keterangan',
        'approve',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detail()
    {
        return $this->hasMany(Opnamedetail::class,'id_opname');
    }

    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    }  
}
