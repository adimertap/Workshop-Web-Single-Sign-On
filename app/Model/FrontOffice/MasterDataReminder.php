<?php

namespace App\Model\FrontOffice;

use Illuminate\Database\Eloquent\Model;

class MasterDataReminder extends Model
{
    protected $table = "tb_fo_master_reminder";

    protected $primaryKey = 'id_master_reminder';

    protected $fillable = [
        'nama_reminder', 'masa_berlaku', 'km_berlaku'
    ];

    protected $hidden = [];

    public $timestamps = false;
}
