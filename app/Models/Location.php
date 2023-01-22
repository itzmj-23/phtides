<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'location',
        'coordinates_lat',
        'coordinates_long',
        'tide_house',
        'instruments',
        'enclosure',
        'controller',
        'tgbm',
        'tide_staff',
        'description',
    ];

    protected $casts = [
        'instruments' => 'array',
        'enclosure' => 'array',
        'controller' => 'array',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    public function predicted_hourly_heights()
    {
        return $this->hasMany(PredictedHourlyHeights::class);
    }

    public function predicted_hi_lows()
    {
        return $this->hasMany(PredictedHiLow::class);
    }

    public function downloadables()
    {
        return $this->hasMany(Downloadables::class);
    }
}
