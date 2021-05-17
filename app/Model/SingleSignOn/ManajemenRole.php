<?php

namespace App\Model\SingleSignOn;

use Illuminate\Database\Eloquent\Model;

class ManajemenRole extends Model
{
    protected $table = "tb_sso_role";

    protected $primaryKey = 'id_role';

    protected $fillable = [
        'nama_role'
    ];

    public $timestamps = false;
}
