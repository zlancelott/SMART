<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;

class Station extends Model
{
    use LogsActivity;
    
    protected static $logAttributes = ['*'];
    
    protected static $logFillable = true;

    protected static $logName = 'station';

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
        return $this->attributes['type'] == config('stations.simple') ? 'Simples' : 'Forno';
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
