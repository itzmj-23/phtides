<?php

namespace App\Http\Controllers;

use App\DataTables\DownloadablesDataTable;
use App\Models\Downloadables;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\Support\MediaStream;

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

        $request->validate([
            'name' => ['required', 'max:200', 'unique:downloadables'],
            'description' => 'max:250',
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
                 'filepath' => '/storage/' . $request->name,
                // 'filename' => $filename,
                'location_id' => $request->location_id,
            ]);

            if ($downloadable) {
                foreach($request->file as $attachment) {

                    $downloadable->addMedia($attachment)
                        ->usingName($attachment->getClientOriginalName())
                        ->usingFileName($attachment->getClientOriginalName())
                        ->toMediaCollection('downloads', 'local_media');
                }

                // Storage::disk('digitalocean')->putFileAs('reports', $request->file, $filename);

                DB::commit();

                toastr()->success('File successfully uploaded!', 'Upload');
                return redirect()->route('downloads.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            toastr()->error($e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function show(Downloadables $downloadables)
    {
        //
    }

    public function edit(Downloadables $downloadables)
    {
        //
    }

    public function update(Request $request, Downloadables $downloadables)
    {
        //
    }

    public function destroy(Downloadables $downloadables)
    {
        //
    }

    public function resources()
    {
        $data = Downloadables::with('location:id,name', 'media:id,model_id,name,file_name,disk')->get();

//        dd($data);

        return response($data);
    }

    public function download($id)
    {
        $downloads = Downloadables::find($id);
        $mediaItems = $downloads->getMedia('downloads');

        foreach($mediaItems as $media) {
            $media->file_name = $media->name;
            $media->save();

            if (count($mediaItems) > 1) {
                return MediaStream::create($downloads['name'] .'.zip')->addMedia($mediaItems);
            } else {
                return $media;
            }
        }
    }
}
