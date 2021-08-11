<?php

namespace App\Model\SingleSignOn;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'tb_role';

    protected $primaryKey = 'id_role';

    protected $fillable = ['role'];

    public $timestamps = false;
}
