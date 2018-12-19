<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class ReaderData extends Model
{
    // use LogsActivity;
    
    // protected static $logAttributes = ['*'];
    
    // protected static $logFillable = true;

    // protected static $logName = 'reader_datas';

    protected $fillable = [
        'reader_id', 'date', 'code'
    ];
}
