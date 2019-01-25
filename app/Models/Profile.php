<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;

class Profile extends Model
{
    // use LogsActivity;
    
    // protected static $logAttributes = ['*'];
    
    // protected static $logFillable = true;

    // protected static $logName = 'profile';
    
    protected $fillable = [
        'name', 'initials', 'description'
    ];

    protected $appends = [
        'created', 'updated'
    ];

    public function getUpdatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y H:m:i');
    }

    public function getCreatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y H:m:i');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }
}
