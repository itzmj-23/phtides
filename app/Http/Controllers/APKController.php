<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class APKController extends Controller
{
    public function __construct()
    {

    }

    public function downloadAPK()
    {
        $path = Storage::path('apk/ph-tides.apk');

        return response()->file($path, [
            'Content-Type'=>'application/vnd.android.package-archive',
            'Content-Disposition'=> 'attachment; filename="ph-tides.apk"',
        ]);
    }
}
