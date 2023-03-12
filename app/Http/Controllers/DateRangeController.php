<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateDateRangeRequest;
use App\Models\DateRange;
use Exception;
use Illuminate\Support\Facades\DB;

class DateRangeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['apiDateRange']);
    }


    public function index()
    {
        $data = DateRange::latest()->first();

        return view('date_range.index', [
            'data' => $data,
        ]);
    }

    public function update(UpdateDateRangeRequest $request)
    {
        $user = auth()->user();
        $updated_by = $user->email;

        $validated = $request->validated();

        try {
            DB::beginTransaction();

            DateRange::create($validated);

            DB::commit();

            toastr()->success('Data has been saved successfully!', 'Success');
            return redirect()->route('date-range.index');
        } catch (\Exception $e) {
            DB::rollBack();

            toastr()->error($e->getMessage(), 'Error');
            return back();
        }
    }


    public function apiDateRange()
    {
        $data = DateRange::latest()->first();

        return response($data);
    }
}
