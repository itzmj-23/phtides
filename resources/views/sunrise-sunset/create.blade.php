@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="text-center">
            <h1 class="font-bold">Sunrise Sunset</h1>
            <p class="">Sunrise Sunset Data Management begins here</p>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <h2 class="card-title">Add Data</h2>
                </div>

                <div class="mt-5">
                    <form id="location_form" action="{{ route('sunrise-sunset.store') }}" method="POST"
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
                                <select class="form-select @error('location_id') is-invalid @enderror" name="location_id">
                                    <option disabled selected>Pick one</option>
                                    @foreach($locations as $location)
                                        <option
                                            value="{{ $location['id'] }}">{{ $location['name'] . ' - Code: '. $location['code'] }}</option>
                                    @endforeach
                                </select>
                                @error('location_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
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
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-block text-center">
                            <a href="{{ route('sunrise-sunset.index') }}"
                               class="btn btn-link" type="button">Cancel</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                        <div class="row mt-3 text-center">
                            <span>Note: Please follow the sample image below for uploading of data file to prevent unseen error.</span>
                            <div class="col mt-3">
                                <img src="{{ Vite::asset('resources/images/sample-sunrise-sunset-snipping-shot.png') }}"
                                     alt="" width="30%">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
