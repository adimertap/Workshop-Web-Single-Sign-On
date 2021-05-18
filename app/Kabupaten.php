<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
     protected $table = 'tb_kabupaten';

    public function Provinsi(){
        return $this->hasOne(Provinsi::class, 'id_provinsi', 'id_provinsi');
    }
}
