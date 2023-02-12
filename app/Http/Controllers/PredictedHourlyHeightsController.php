<?php

namespace App\Http\Controllers;

use App\DataTables\PredictedHourlyHeightsDataTable;
use App\Imports\PredictedHourlyHeightsImport;
use App\Models\Location;
use App\Models\PredictedHourlyHeights;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PredictedHourlyHeightsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(PredictedHourlyHeightsDataTable $dataTable)
    {
        $data = PredictedHourlyHeights::with('location')->get();

        return $dataTable->render('predicted_hourly_heights.index');
    }


    public function create()
    {
        $locations = Location::orderBy('name')->get();

        return view('predicted_hourly_heights.create', [
           'locations' => $locations,
        ]);
    }


    public function store(Request $request)
    {
//        dd($request->all());
        $validated = $request->validate([
            'location_id' => 'required',
            'file' => 'required',
        ]);

        try {
//            toastr()->info('Importing Data. Please wait.', 'Info');
            DB::beginTransaction();

            // Import CSV to DB
            $this->importCSVtoDB($validated);

            DB::commit();
            toastr()->success('Data has been saved successfully!', 'Success');
            return redirect()->route('predicted_hourly_heights.index');

        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage(), 'Error');
            return back();
        }
    }


    public function edit()
    {

    }


    public function update()
    {

    }


    public function destroy()
    {

    }


    public function importCSVtoDB($data)
    {
        Excel::import(new PredictedHourlyHeightsImport($data['location_id']), $data['file']);
    }

    public function apiPredictedHourlyHeightsByLocation($id)
    {
        try {
            $data = PredictedHourlyHeights::where('location_id', $id)->get(['date', 'hour', 'tide']);

//            dd($data);

            if(count($data) <= 0) {
                return response([
                    'result' => 'No data.',
                    'message' => 'success',
                ], 200);
            }

            return response($data);

//            return response([
//                'data' => $data,
//                'message' => 'success',
//            ], 200);
        } catch (\Exception $e) {
            return response([
                'result' => $e->getMessage(),
                'message' => 'error',
            ], 500);
        }
    }

    public function apiTestExport()
    {
        return Excel::download(new PredictedHourlyHeights, 'test.csv');
    }
}
