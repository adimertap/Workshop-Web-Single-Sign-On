<?php

namespace App\Model\FrontOffice;

use Illuminate\Database\Eloquent\Model;

class MasterDataPitstop extends Model
{
    protected $table = "tb_fo_master_pitstop";

    protected $primaryKey = 'id_pitstop';

    protected $fillable = [
        'nama_pitstop', 'kode_pitstop'
    ];

    protected $hidden = [];

    public $timestamps = false;
}
