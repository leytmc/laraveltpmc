<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email','role_id', 'password',
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
