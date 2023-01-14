<?php

namespace App\Imports;

use App\Models\PredictedHourlyHeights;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PredictedHourlyHeightsImport implements ToModel, WithStartRow
{
    protected $location_id;

    public function __construct($location_id)
    {
        $this->location_id = $location_id;
    }

    public function startRow(): int
    {
        return 2;
    }


    public function model(array $row)
    {
        return new PredictedHourlyHeights([
            'location_id' => $this->location_id,
            'date' => $row[0],
            'hour' => $row[1],
            'tide' => $row[2],
        ]);
    }
}
