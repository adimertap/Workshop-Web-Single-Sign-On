<?php

namespace App\Model\SingleSignOn;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'tb_sso_det_user_aplikasi';

    protected $primaryKey = 'id_sso_det_user_aplikasi';

    protected $fillable = ['id_sso_aplikasi', 'id_user'];

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_sso_aplikasi');
    }
}
