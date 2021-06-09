<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = "tb_bank";

    protected $primaryKey = 'id_bank';

    protected $fillable = [
        'nama_bank',
        'code_bank'
    ];
}
