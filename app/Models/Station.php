<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Station extends Model
{
    protected $fillable = [
        'name', 'type', 'number_readers', 'number_zones'
    ];

    protected $appends = [
        'created', 'updated', 'type_description'
    ];

    public function readers()
    {
        return $this->hasMany(Reader::class);
    }

    public function getTypeDescriptionAttribute()
    {
        return $this->attributes['type'] == config('station.simpple') ? 'Simples' : 'Forno';
    }

    public function getUpdatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y H:m:i');
    }

    public function getCreatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y H:m:i');
    }
}
