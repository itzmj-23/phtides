<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class   Downloadables extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'category',
        'timeframe',
        'description',
        'location_id'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('primary-hourly-heights');
        $this->addMediaCollection('primary-hi-low	');
        $this->addMediaCollection('secondary-hourly-heights');
        $this->addMediaCollection('secondary-hi-low');
    }
}
