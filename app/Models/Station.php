<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = [
        'name', 'type', 'readers', 'zones'
    ];

    public function readers()
    {
        return $this->hasMany(Reader::class);
    }
}
