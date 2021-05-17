<?php

namespace App\Model\Note\noteadim;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;

class Adim extends Model
{
    protected $table = "note_goals_harian";

    protected $primaryKey = 'id_catatan';

    protected $fillable = [
       'tanggal',
       'modul',
       'catatan',
       'progress',
       'status'
    ];

    protected $hidden =[ 
      
    ];

    public $timestamps = false;

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
