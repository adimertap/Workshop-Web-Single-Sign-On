<?php

namespace App\Model\SingleSignOn;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'tb_sso_aplikasi';

    protected $primaryKey = 'id_sso_aplikasi';

    protected $fillable = ['nama_aplikasi'];

    public $timestamps = false;
}
