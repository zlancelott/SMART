<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    use LogsActivity;

    protected static $logAttributes = ['*'];
    
    protected static $logFillable = true;

    protected static $logName = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile'
    ];

    protected $appends = [
        'created', 'updated'
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

    public function getUpdatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y H:m:i');
    }

    public function getCreatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y H:m:i');
    }

    public function getMenu()
    {
        $menu = [];

        foreach ($this->profiles as $profile) {
            foreach ($profile->pages as $page) {
                foreach ($page->profiles as $p) {
                    if ($p->pivot->view) {
                        $menu[$page->route] = $page->route;
                    }
                }
            }
        }

        sort($menu);

        return $menu;
    }

    public function isAllowedToView($route)
    {
        // dd($route);

        $result = false;
        $method = explode('.', $route)[1];
        $permissions = [];

        foreach ($this->profiles as $profile) {
            foreach ($profile->pages as $page) {
                foreach ($page->profiles as $p) {
                    array_push($permissions, [
                        
                        'route' => $page->route,

                        // GET
                        'index' => $p->pivot->view,
                        'edit' => $p->pivot->edit,
                        'delete' => $p->pivot->delete,
                        'create' => $p->pivot->create,
                        
                        // POST
                        'update' => $p->pivot->edit ? 1 : 0,
                        'store' => $p->pivot->create ? 1 : 0,
                        'destroy' => $p->pivot->delete ? 1 : 0,
                    ]);
                }
            }
        }

        // dd($route, $method, $permissions);

        foreach ($permissions as $permission) {
            if ($permission['route'] == $route && isset($permission[$method]) && $permission[$method] == 1) {
                $result = true;
                break;
            }
        }

        return $result;
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function isSuperAdmin()
    {
        $result = false;

        foreach ($this->profiles as $profile) {
            if ($profile->initials == 'super') {
                $result = true;
                break;
            }
        }

        return $result;
    }

    public function isAdmin()
    {
        $result = false;

        foreach ($this->profiles as $profile) {
            if ($profile->initials == 'admin') {
                $result = true;
                break;
            }
        }

        return $result;
    }
}
