<?php

namespace App\Model\FrontOffice;

use Illuminate\Database\Eloquent\Model;

class MasterDataDiskon extends Model
{
    protected $table = "tb_fo_master_diskon";

    protected $primaryKey = 'id_diskon';

    protected $fillable = [
        'nama_diskon', 'jumlah_diskon', 'tanggal_mulai', 'tanggal_selesai'
    ];

    protected $hidden = [];

    public $timestamps = false;
}
