<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesaBaru extends Model
{
    protected $table = 'tb_desa';

    public function Kecamatan(){
        return $this->hasOne(KecamatanBaru::class, 'id_kecamatan', 'id_kecamatan');
    }
}

