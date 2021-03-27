<?php

namespace App\Model\Note\noteadim;

use Illuminate\Database\Eloquent\Model;

class Adim extends Model
{
    protected $table = "note_goals_harian";

    protected $primaryKey = 'id_catatan';

    protected $fillable = [
       'tanggal',
       'modul',
       'catatan',
       'status'
    ];

    protected $hidden =[ 
      
    ];

    public $timestamps = false;
}
