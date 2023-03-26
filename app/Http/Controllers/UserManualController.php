<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserManualRequest;
use App\Http\Requests\UpdateUserManualRequest;
use App\Models\UserManual;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserManualController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->except('downloadUserManual');
    }

    // Download User Manual
    public function index()
    {
        $data = UserManual::latest()->get();

        return view('user-manual.index', [
            'data' => $data,
        ]);
    }


    public function create()
    {
        return view('user-manual.create');
    }


    public function store(StoreUserManualRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $data = UserManual::create($validated);

            if ($data) {
                $data->addMedia($validated['file'])
                    ->usingName($validated['file']->getClientOriginalName())
                    ->usingFileName($validated['file']->getClientOriginalName())
                    ->toMediaCollection('user-manual', 'local_media');

                // Storage::disk('digitalocean')->putFileAs('reports', $request->file, $filename);

                DB::commit();

                toastr()->success('User Manual successfully uploaded!', 'Upload');
                return redirect()->route('userManual.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            toastr()->error($e->getMessage(), 'Error');
            return redirect()->back();
        }
    }


    public function show($id)
    {
        $model = UserManual::find($id);
        $media = $model->getMedia('user-manual');
        $mediaItem = $media->last();

        return response()->file($mediaItem->getPath(), [
            'Content-Disposition' => 'inline; filename="'. $model['title'] .'"'
        ]);
    }


    public function edit($id)
    {
        $data = UserManual::find($id);

        return view('user-manual.edit', [
            'data' => $data,
        ]);
    }


    public function update(UpdateUserManualRequest $request)
    {
        $validated = $request->validated();

        dd($validated);
    }


    public function destroy()
    {

    }


}
