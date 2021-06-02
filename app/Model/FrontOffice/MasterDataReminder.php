<?php

namespace App\Model\FrontOffice;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;

class MasterDataReminder extends Model
{
    protected $table = "tb_fo_master_reminder";

    protected $primaryKey = 'id_master_reminder';

    protected $fillable = [
        'nama_reminder', 'masa_berlaku', 'km_berlaku', 'id_bengkel'
    ];

    protected $hidden = [];

    public $timestamps = false;

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
