<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateRange extends Model
{
    use HasFactory;

    protected $fillable = [
        'min_date',
        'max_date',
        'updated_by',
    ] ;

    protected $casts = [
        'min_date' => 'date:m/d/Y',
        'max_date' => 'date:m/d/Y',
    ];
}
