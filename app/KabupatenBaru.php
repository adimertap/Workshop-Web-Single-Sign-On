<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KabupatenBaru extends Model
{
    protected $table = 'tb_kabupaten_baru';
    public function Provinsi(){
        return $this->hasOne(ProvinsiBaru::class, 'id_provinsi', 'id_provinsi');
    }
}
