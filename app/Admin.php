<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table='admins';

    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password','lab_name', 'univ', 'dept',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function univ(){
        return $this->hasMany(Univ::class);
    }
    public function dept(){
        return $this->hasMany(Dept::class);
    }

    /**
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
//        if (is_array($roles)) {
//            return $this->hasAnyRole($roles) ||
//                abort(401, $roles.'는 다음 페이지에 권한이 없습니다.');
//        }
        return $roles === 'admin'
            ? $this->hasRole($roles) || abort(401, '연구 관리자는 다음 페이지에 권한이 없습니다.')
            : $this->hasRole($roles) || abort(401, '시스템 운영자는 다음 페이지에 권한이 없습니다.');
    }

    public function isAdmin()
    {
        return ($this-> id === 1|| $this->id === 2) ? true : false;
    }



    /**
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

}
