<?php

namespace App\Model\SingleSignOn;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'tb_det_role_user';

    protected $primaryKey = 'id_det_role_user';

    protected $fillable = ['id_role', 'id_user'];

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
}
