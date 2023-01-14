<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictedHourlyHeights extends Model
{
    use HasFactory;

    protected $fillable = [
      'date',
      'hour',
      'tide',
    'location_id',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
