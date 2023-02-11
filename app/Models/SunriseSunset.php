<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SunriseSunset extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'rise',
        'set',
        'location_id',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
