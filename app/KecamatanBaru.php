<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KecamatanBaru extends Model
{
    protected $table = 'tb_kecamatan';
     public function Kabupaten(){
        return $this->hasOne(KabupatenBaru::class, 'id_kabupaten', 'id_kabupaten');
    }
    
}
