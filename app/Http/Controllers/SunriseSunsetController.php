<?php

namespace App\Http\Controllers;

use App\DataTables\SunriseSunsetDataTable;
use App\Imports\SunriseSunsetImport;
use App\Models\Location;
use App\Models\SunriseSunset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SunriseSunsetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(SunriseSunsetDataTable $dataTable)
    {
        return $dataTable->render('sunrise-sunset.index');
    }

    public function create()
    {
        $locations = Location::orderBy('name')->get();

        return view('sunrise-sunset.create', [
            'locations' => $locations,
        ]);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $validated = $request->validate([
            'location_id' => 'required',
            'file' => 'required',
        ], [
            'location_id.required' => 'The location field is required.',
        ]);

        try {
//            toastr()->info('Importing Data. Please wait.', 'Info');
            DB::beginTransaction();

            // Import CSV to DB
            $this->importCSVtoDB($validated);

            DB::commit();
            toastr()->success('Data has been saved successfully!', 'Success');
            return redirect()->route('sunrise-sunset.index');

        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage(), 'Error');
            return back();
        }
    }

    public function importCSVtoDB($data)
    {
        Excel::import(new SunriseSunsetImport($data['location_id']), $data['file']);
    }

    public function apiSunriseSunsetByLocation($id)
    {
        try {
            $data = SunriseSunset::where('location_id', $id)->get(['date', 'rise', 'set']);

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


}
