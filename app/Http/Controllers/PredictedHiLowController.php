<?php

namespace App\Http\Controllers;

use App\DataTables\PredictedHiLowsDataTable;
use App\Imports\PredictedHiLowsImport;
use App\Models\Location;
use App\Models\PredictedHiLow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PredictedHiLowController extends Controller
{
    public function __construct()
    {

    }

    public function index(PredictedHiLowsDataTable $dataTable)
    {
        return $dataTable->render('predicted_hi_lows.index');
    }

    public function create()
    {
        $locations = Location::all();

        return view('predicted_hi_lows.create', [
            'locations' => $locations,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_id' => 'required',
            'file' => 'required',
        ]);

        try {
            DB::beginTransaction();

            // Import CSV to DB
            $this->importCSVtoDB($validated);

            DB::commit();
            toastr()->success('Data has been saved successfully!', 'Success');
            return redirect()->route('predicted_hi_lows.index');

        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage(), 'Error');
            return back();
        }
    }

    public function importCSVtoDB($data)
    {
        Excel::import(new PredictedHiLowsImport($data['location_id']), $data['file']);
    }

    public function apiPredictedHiLowsByLocation($id)
    {
        try {
            $data = PredictedHiLow::where('location_id', $id)->get(['date', 'hour', 'tide']);

//            dd($data);

            if(count($data) <= 0) {
                return response([
                    'result' => 'No data.',
                    'message' => 'success',
                ], 200);
            }

            return response($data);

        } catch (\Exception $e) {
            return response([
                'result' => $e->getMessage(),
                'message' => 'error',
            ], 500);
        }
    }



}
