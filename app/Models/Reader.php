<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use LogsActivity;
    
    protected static $logAttributes = ['*'];
    
    protected static $logFillable = true;

    protected static $logName = 'reader';

    protected $fillable = [
        'station_id', 'ip', 'type', 'position'
    ];

    public function readerData()
    {
        return $this->hasMany(ReaderData::class)->orderBy('created_at', 'desc');
    }
}
