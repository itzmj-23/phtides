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
    public function __construct()
    {
        $this->middleware('auth')
            ->except(
                'primaryHourlyHeightsLoc', 'primaryHiLowLoc', 'secondaryHourlyHeightsLoc',
                'secondaryHiLowLoc', 'locationDownloadables', 'download', 'astronomical', 'viewPDF',
            );
    }

    public function index(DownloadablesDataTable $dataTable)
    {
        return $dataTable->render('downloadables.index');
    }

    public function create()
    {
        $locations = Location::orderBy('name')->get();

        return view('downloadables.create', [
            'locations' => $locations,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'timeframe' => 'required',
            'description' => 'max:250',
            'file' => [
                'required',
                'mimes:ppt,pptx,doc,docx,xls,xlsx,csv,txt,xlx,pdf,png,jpeg,jpg,pdf',
                'max:20480'],
            'location_id' => 'required',
            'collection_name' => 'required',
        ], [
            'file.max' => 'The file must not be greater that 20MB.',
            'location_id.required' => 'The location field is required.',
            'collection_name.required' => 'The category field is required.',
            'timeframe.required' => 'The month year field is required.',
        ]);

        try {
            DB::beginTransaction();

            $downloadable = Downloadables::create([
                'category' => $request->collection_name,
                'timeframe' => $request->timeframe,
                'description' => $request->description,
                'location_id' => $request->location_id,
            ]);

            if ($downloadable) {
                $downloadable->addMedia($request['file'])
                    ->usingName($request['file']->getClientOriginalName())
                    ->usingFileName($request['file']->getClientOriginalName())
                    ->toMediaCollection($request['collection_name'], 'local_media');

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

    public function primaryHourlyHeightsLoc()
    {
        $locationWithDownloadables = Location::with(['downloadables' => function ($q) {
            $q->where('category', 'primary-hourly-heights');
            $q->select(['id', 'location_id', 'category', 'timeframe']);
        }
        ])
            ->whereHas('downloadables', function ($q) {
                $q->where('category', 'primary-hourly-heights');
            })
            ->orderBy('name')
            ->get(['id', 'name']);

        return response($locationWithDownloadables);
    }

    public function primaryHiLowLoc()
    {
        $locationWithDownloadables = Location::with(['downloadables' => function ($q) {
            $q->where('category', 'primary-hi-low');
            $q->select(['id', 'location_id', 'category', 'timeframe']);
        }
        ])
            ->whereHas('downloadables', function ($q) {
                $q->where('category', 'primary-hi-low');
            })
            ->orderBy('name')
            ->get(['id', 'name']);

        return response($locationWithDownloadables);
    }

    public function secondaryHourlyHeightsLoc()
    {
        $locationWithDownloadables = Location::with(['downloadables' => function ($q) {
            $q->where('category', 'secondary-hourly-heights');
            $q->select(['id', 'location_id', 'category', 'timeframe']);
        }
        ])
            ->whereHas('downloadables', function ($q) {
                $q->where('category', 'secondary-hourly-heights');
            })
            ->orderBy('name')
            ->get(['id', 'name']);

        return response($locationWithDownloadables);
    }

    public function secondaryHiLowLoc()
    {
        $locationWithDownloadables = Location::with(['downloadables' => function ($q) {
            $q->where('category', 'secondary-hi-low');
            $q->select(['id', 'location_id', 'category', 'timeframe']);
        }
        ])
            ->whereHas('downloadables', function ($q) {
                $q->where('category', 'secondary-hi-low');
            })
            ->orderBy('name')
            ->get(['id', 'name']);

        return response($locationWithDownloadables);
    }

    public function locationDownloadables($id, $category)
    {
        $data = Downloadables::whereHas('location')
            ->whereRelation('location', 'id', $id)
            ->where('category', $category)
            ->orderBy('name')
            ->get();

        return response($data);
    }

    public function astronomical()
    {
        $locationWithDownloadables = Location::with(['downloadables' => function ($q) {
            $q->where('category', 'astronomical');
            $q->select(['id', 'location_id', 'category', 'timeframe']);
        }
        ])
            ->whereHas('downloadables', function ($q) {
                $q->where('category', 'astronomical');
            })
            ->orderBy('name')
            ->get(['id', 'name']);

        return response($locationWithDownloadables);
    }

    public function download($id, $collection_name, $timeframe)
    {
        $downloads = Downloadables::where('id', $id)
            ->where('timeframe', $timeframe)
            ->where('category', $collection_name)->first();

        $mediaItems = $downloads->getMedia($collection_name);

        foreach ($mediaItems as $media) {
            $media->file_name = $media->name;
            $media->save();

            if (count($mediaItems) > 1) {
                return MediaStream::create($downloads['name'] . '.zip')->addMedia($mediaItems);
            } else {
                return $media;
            }
        }
    }

    public function viewPDF($id, $collection_name, $timeframe)
    {
        $downloads = Downloadables::where('id', $id)
            ->where('timeframe', $timeframe)
            ->where('category', $collection_name)->first();

        $mediaItems = $downloads->getMedia($collection_name);

        return response()->file($mediaItems[0]->getPath(), [
            'Content-Disposition' => 'inline; filename="'. $mediaItems[0]->file_name .'"'
        ]);
    }
}
