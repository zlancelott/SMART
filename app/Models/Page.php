<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Page extends Model
{
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
