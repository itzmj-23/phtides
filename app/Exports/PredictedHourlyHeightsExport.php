<?php

namespace App\Exports;

use App\Models\PredictedHourlyHeights;
use Maatwebsite\Excel\Concerns\FromCollection;

class PredictedHourlyHeightsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PredictedHourlyHeights::all();
    }
}
