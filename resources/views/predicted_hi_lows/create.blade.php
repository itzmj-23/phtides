@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-3">
        <div class="text-center">
            <h1 class="">Predicted High and Low</h1>
            <p class="">Predicted High and Low Management begins here</p>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <h2 class="card-title">Add Data</h2>
                </div>

                <div class="mt-5">
                    <form id="location_form" action="{{ route('predicted_hi_lows.store') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Location</span>
                                    <span class="label-text-alt">*</span>
                                </label>
                            </div>
                            <div class="col">
                                <select class="form-select" name="location_id">
                                    <option disabled selected>Pick one</option>
                                    @foreach($locations as $location)
                                        <option
                                            value="{{ $location['id'] }}">{{ $location['name'] . ' - Code: '. $location['code'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Pick a file</span>
                                    <span class="label-text-alt">*</span>
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="file" name="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-block text-center">
                            <a href="{{ route('predicted_hi_lows.index') }}"
                               class="btn btn-link" type="button">Cancel</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                        <div class="row mt-3 text-center">
                            <span>Note: Please follow the sample image below for uploading of data file to prevent unseen error.</span>
                            <div class="col mt-3">
                                <img src="{{ Vite::asset('resources/images/predicted_hi_lows_sample.png') }}"
                                     alt="" width="50%">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
