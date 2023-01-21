<?php

namespace App\Http\Controllers;

use App\DataTables\DownloadablesDataTable;
use App\Models\Downloadables;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DownloadablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DownloadablesDataTable $dataTable)
    {
        return $dataTable->render('downloadables.index');
    }

    public function create()
    {
        $locations = Location::all();

        return view('downloadables.create', [
            'locations' => $locations,
        ]);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => ['required', 'max:200', 'unique:reports'],
            'description' => ['required', 'max:250'],
            'file.*' => [
                'required',
                'mimes:ppt,pptx,doc,docx,xls,xlsx,csv,txt,xlx,pdf,png,jpeg,jpg,pdf',
                'max:20480'],
            'location_id' => 'required',
        ],[
            'file.*.max' => 'The file must not be greater that 20MB.',
            'name.unique' => 'The name is not available. Please try another.'
        ]);

        try {
            DB::beginTransaction();

            $downloadable = Downloadables::create([
                'name' => $request->name,
                'description' => $request->description,
                // 'original_filename' => $original_filename,
                // 'filename' => $filename,
            ]);

            if ($downloadable) {
                foreach($request->attachments as $attachment) {
                    $report->addMedia($attachment)
                        ->usingName($attachment->getClientOriginalName())
                        ->usingFileName($attachment->hashName())
                        ->toMediaCollection('reports', 'local_media');
                }

                // Storage::disk('digitalocean')->putFileAs('reports', $request->file, $filename);

                DB::commit();

                toastr()->success('File successfully uploaded!', 'Upload');
                return redirect()->route('admin.report.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            toastr()->error($e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Downloadables  $downloadables
     * @return \Illuminate\Http\Response
     */
    public function show(Downloadables $downloadables)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Downloadables  $downloadables
     * @return \Illuminate\Http\Response
     */
    public function edit(Downloadables $downloadables)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Downloadables  $downloadables
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Downloadables $downloadables)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Downloadables  $downloadables
     * @return \Illuminate\Http\Response
     */
    public function destroy(Downloadables $downloadables)
    {
        //
    }
}
