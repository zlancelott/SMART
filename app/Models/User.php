<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile'
    ];

    protected $appends = [
        'profile_description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    public function getProfileDescriptionAttribute()
    {   
        switch ($this->attributes['profile']) {
            
            case config('profiles.superadmin'):
                return 'Super administrador';
            
            case config('profiles.admin'):
                return 'Administrador';

            default:
                return 'Operador';
        }
    }

    public function isSuperAdmin()
    {
        return config('profiles.superadmin') == $this->profile ?: false;
    }

    public function isAdmin()
    {
        return config('profiles.admin') == $this->profile ?: false;
    }

    public function isOperator()
    {
        return config('profiles.operator') == $this->profile ?: false;
    }
}
