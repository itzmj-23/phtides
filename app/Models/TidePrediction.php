<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TidePrediction extends Model
{
    use HasFactory;

    protected $fillable = [
      'location_id',
        '00',
        '01',
        '02',
        '03',
        '04',
        '05',
        '06',
        '07',
        '08',
        '09',
        '10',
        '11',
        '12',
        '13',
        '14',
        '15',
        '16',
        '17',
        '18',
        '19',
        '20',
        '21',
        '22',
        '23',
        'DD',
        'MM',
        'YYYY',
    ];


    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
