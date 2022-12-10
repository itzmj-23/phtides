<?php

namespace App\Imports;

use App\Models\TidePrediction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TidePredictionImport implements ToModel, WithStartRow
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
        return new TidePrediction([
            'location_id' => $this->location_id,
            '00' => $row[0],
            '01' => $row[1],
            '02' => $row[2],
            '03' => $row[3],
            '04' => $row[4],
            '05' => $row[5],
            '06' => $row[6],
            '07' => $row[7],
            '08' => $row[8],
            '09' => $row[9],
            '10' => $row[10],
            '11' => $row[11],
            '12' => $row[12],
            '13' => $row[13],
            '14' => $row[14],
            '15' => $row[15],
            '16' => $row[16],
            '17' => $row[17],
            '18' => $row[18],
            '19' => $row[19],
            '20' => $row[20],
            '21' => $row[21],
            '22' => $row[22],
            '23' => $row[23],
            'DD' => $row[24],
            'MM' => $row[25],
            'YYYY' => $row[26],
        ]);
    }
}
