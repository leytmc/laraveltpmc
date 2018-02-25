<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{

    use Authenticatable,
        Authorizable,
        CanResetPassword,
        Notifiable,
        LaratrustUserTrait {
        LaratrustUserTrait::can insteadof Authorizable;
        Authorizable::can as authorizableCan;
        }
    protected $fillable = [
        'name', 'email', 'password', 'settings',  'user_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public  function roles(){
        return $this->belongsToMany(Role::class);
    }


    /* @param string | array $roles */
    public function authorizeRoles($roles){

        if(is_array($roles)){

            return $this->hasAnyRole($roles) ||
            abort(401, 'Cette action est interdite.');
        }

        return $this->hasRole($roles) ||
        abort(401, 'Cette action est autorisée.');
    }

    /* Check multiple roles @param array $roles */
    public function hasAnyRole($roles){
        
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /* Check one role @param array $roles */
    public function hasRole($role){
        
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }
// fin -------------------------------    
}
