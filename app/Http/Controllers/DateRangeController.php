<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateRangeController extends Controller
{
    //
    public function __construct()
    {

    }


    public function index()
    {
        return view('date_range.index', [
        ]);
    }

    public function update(Request $request)
    {
        dd($request);
    }
}
