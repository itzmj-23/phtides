<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $data = Location::all();

        return view('location.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('location.create');
    }

    public function store(Request $request)
    {
        if ($request['instruments']) {
            $array = explode(',', $request['instruments']);

            $request->merge(['instruments' => $array]);
        }

        if ($request['enclosure']) {
            $array = explode(',', $request['enclosure']);

            $request->merge(['enclosure' => $array]);
        }

        if ($request['controller']) {
            $array = explode(',', $request['controller']);

            $request->merge(['controller' => $array]);
        }

        $validated = $request->validate([
            'code' => 'nullable',
            'name' => 'required|unique:locations,name',
            'description' => 'nullable',
            'location' => 'nullable',
            'coordinates_lat' => 'nullable',
            'coordinates_long' => 'nullable',
            'tide_house' => 'nullable',
            'instruments' => 'nullable',
            'enclosure' => 'nullable',
            'controller' => 'nullable',
            'tgbm' => 'nullable',
            'tide_staff' => 'nullable',
        ]);

        try {
            DB::beginTransaction();

            Location::create($validated);

            DB::commit();
            toastr()->success('Data has been saved successfully!', 'Success');
            return redirect()->route('location.index');
        } catch (\Exception $e) {
            DB::rollBack();

            toastr()->error($e->getMessage(), 'Error');
            return back();
        }
    }

    public function show($id)
    {
        $data = Location::find($id);

        return view('location.show', [
            'data' => $data,
        ]);
    }

    public function edit()
    {
        return view('location.edit');
    }

    public function update(Request $request, $id)
    {
        $data = Location::find($id);

        if ($request['instruments']) {
            $array = explode(',', $request['instruments']);

            $request->merge(['instruments' => $array]);
        }

        if ($request['enclosure']) {
            $array = explode(',', $request['enclosure']);

            $request->merge(['enclosure' => $array]);
        }

        if ($request['controller']) {
            $array = explode(',', $request['controller']);

            $request->merge(['controller' => $array]);
        }

        $validated = $request->validate([
            'code' => 'nullable|sometimes|unique:locations,code,'. $data['id'],
            'name' => 'required|unique:locations,name,'. $data['id'],
            'description' => 'nullable',
            'location' => 'nullable',
            'coordinates_lat' => 'nullable',
            'coordinates_long' => 'nullable',
            'tide_house' => 'nullable',
            'instruments' => 'nullable',
            'enclosure' => 'nullable',
            'controller' => 'nullable',
            'tgbm' => 'nullable',
            'tide_staff' => 'nullable',
        ]);

        try {
            DB::beginTransaction();

            $data->update($validated);

            DB::commit();
            toastr()->success('Data has been updated successfully!', 'Success');
            return redirect()->route('location.index');
        } catch (\Exception $e) {
            DB::rollBack();

            toastr()->error($e->getMessage(), 'Error');
            return back();
        }
    }

    public function destroy()
    {

    }

    // ---------- API LOCATION ------------------------
    public function apiLocation()
    {
        try {
            $data = Location::has('predicted_hourly_heights')->get(['id', 'code', 'name', 'location']);

            return response($data);

//            return response([
//                'result' => $data,
//                'message' => 'success'
//            ], 200);
        } catch (\Exception $e) {
            return response([
                'result' => $e->getMessage(),
                'message' => 'error'
            ], 500);
        }
    }

    public function apiLocationByID($id)
    {
        try {
            $data = Location::find($id);

            return response($data);

//            return response([
//                'result' => $data,
//                'message' => 'success'
//            ], 200);
        } catch (\Exception $e) {
            return response([
                'result' => $e->getMessage(),
                'message' => 'error'
            ], 500);
        }
    }
}
