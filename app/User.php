<?php

namespace App;

use App\Model\Kepegawaian\Pegawai;
use App\Model\SingleSignOn\Bengkel;
use App\Model\SingleSignOn\ManajemenRole;
use App\Model\SingleSignOn\Role;
use App\Model\SingleSignOn\RoleUser;
use App\Scopes\OwnershipScope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guard_name = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'id_bengkel', 'id_pegawai', 'username', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relations
    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class, 'id_bengkel', 'id_bengkel');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function roleType()
    {
        return $this->belongsToMany(Role::class, 'tb_det_role_user', 'id_user', 'id_role');
    }

    public function scopeOwnership($query)
    {
        return $query->where('id_bengkel', '=', Auth::user()->id_bengkel);
    }

    public function hasRole($inputRole)
    {
        $roles = $this->roleType;

        foreach ($roles as $role) {
            if ($role->role == $inputRole) {
                return true;
            }
        }
        return false;
    }

    public function getRoleNameAttribute()
    {
        $RoleName = "";
        switch ($this->role) {
            case 'owner':
                $RoleName = 'Owner';
                break;
            case 'admin_front_office':
                $RoleName = 'Admin Front Office';
                break;
            case 'admin_service_advisor':
                $RoleName = 'Admin Service Advisor';
                break;
            case 'admin_service_instructor':
                $RoleName = 'Admin Service Instructor';
                break;
            case 'admin_kasir':
                $RoleName = 'Admin Kasir';
                break;
            case 'admin_gudang':
                $RoleName = 'Admin Gudang';
                break;
            case 'admin_purchasing':
                $RoleName = 'Admin Purchasing';
                break;
            case 'admin_accounting':
                $RoleName = 'Admin Accounting';
                break;
            case 'admin_marketplace':
                $RoleName = 'Admin Marketplace';
                break;
            default:
                $RoleName = "";
        }
        return $RoleName;
    }
}
