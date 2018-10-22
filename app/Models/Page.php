<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;

class Page extends Model
{
    use LogsActivity;
    
    protected static $logAttributes = ['*'];
    
    protected static $logFillable = true;

    protected static $logName = 'page';

    protected $fillable = [
        'name', 'route'
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

    public function profiles()
    {
        return $this->belongsToMany(Profile::class)->withPivot(['view', 'create', 'edit', 'delete']);
    }
}
