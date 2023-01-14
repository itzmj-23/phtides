@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="hero bg-base-200 mt-5">
            <div class="hero-content text-center">
                <div class="max-w-xxl">
                    <h1 class="text-5xl font-bold">Predicted Hourly Heights</h1>
                    <p class="py-6">Predicted Hourly Heights Management begins here</p>
                </div>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl mt-5">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <h2 class="card-title">Add New Data</h2>
                    <div class="card-actions justify-end">
                        <a href="{{ route('predicted_hourly_heights.create') }}" class="btn btn-primary">Submit</a>
                    </div>
                </div>

                <div class="grid mt-5">
                    <form id="location_form" action="{{ route('predicted_hourly_heights.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid">
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Location</span>
                                    <span class="label-text-alt">Required</span>
                                </label>
                                <select class="select select-bordered" name="location_id">
                                    <option disabled selected>Pick one</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location['id'] }}">{{ $location['name'] . ' - Code: '. $location['code'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="grid mb-5">
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Pick a file</span>
                                    <span class="label-text-alt">Required</span>
                                </label>
                                <input type="file" name="file" class="file-input file-input-bordered w-full" />

                            </div>
                        </div>
                        <span>Note: Please follow the sample image below for uploading of data file to prevent unseen error.</span>
                        <div class="grid mt-3">
                            <img src="{{ Vite::asset('resources/images/header_of_predicted_hourly_heights.png') }}" alt="" class="w-100">
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            <a href="{{ route('location.create') }}" class="btn bg-error col-start-2 max-w-xs mt-5 text-right" type="button">Clear</a>
                            <button class="btn bg-primary max-w-xs mt-5" type="submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
