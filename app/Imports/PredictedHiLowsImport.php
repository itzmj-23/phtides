<?php

namespace App\Imports;

use App\Models\PredictedHiLow;
use App\Models\PredictedHourlyHeights;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PredictedHiLowsImport implements ToCollection, WithStartRow, SkipsOnError
{
    use Importable, SkipsErrors;

    protected $location_id;

    public function __construct($location_id)
    {
        $this->location_id = $location_id;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {
//        Validator::make($rows->toArray(), [
//            '*.1' => Rule::unique('predicted_hi_lows', 'hour')->where(function ($query) use ($rows) {
//                return $query
//                    ->where('date', $rows[0][0])
//                    ->where('hour', $rows[0][1]);
//            }),
//        ],[
//            '*.1.unique' => 'Duplicate row data.',
//        ])->validate();

        foreach ($rows as $row) {
            PredictedHiLow::create([
                'date' => $row[0],
                'hour' => $row[1],
                'tide' => $row[2],
                'location_id' => $this->location_id,
            ]);
        }
    }
}
