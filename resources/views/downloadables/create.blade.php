@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-3">
        <div class="text-center">
            <h1 class="">Downloadable Resources</h1>
            <p class="">Downloadable Resources Management begins here</p>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <h2 class="card-title">Add Resources</h2>
                </div>

                <div class="mt-5">
                    <form id="location_form" action="{{ route('downloads.store') }}" method="POST"
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
                                            value="{{ $location['id'] }}" {{ old('location_id') == $location['id'] ? 'selected' : '' }}>{{ $location['name'] . ' - Code: '. $location['code'] }}</option>
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
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Resource Title</span>
                                    <span class="label-text-alt">*</span>
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group timeframe">
                                    <input id="" name="timeframe" type="text" class="form-control @error('timeframe') is-invalid @enderror" placeholder="Resource title in downloading the file. Ex: Jan-Feb 2023 or Sunrise Sunset 2023">
                                    @error('timeframe')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
{{--                                    <input id="timeframe" name="timeframe" type="text" class="form-control @error('timeframe') is-invalid @enderror" placeholder="Choose date and month">--}}
{{--                                    @error('timeframe')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Category</span>
                                    <span class="label-text-alt">*</span>
                                </label>
                            </div>
                            <div class="col">
                                <select class="form-select @error('collection_name') is-invalid @enderror" name="collection_name">
                                    <option disabled selected>Pick one</option>
                                    <option value="primary-hourly-heights">Primary Tide Stations - Hourly Heights</option>
                                    <option value="primary-hi-low">Primary Tide Stations - Hi and Low Waters</option>
                                    <option value="secondary-hourly-heights">Secondary Tide Stations - Hourly Heights</option>
                                    <option value="secondary-hi-low">Secondary Tide Stations - Hi and Low Waters</option>
                                    <option value="astronomical">Astronomical Data</option>
                                </select>
                                @error('collection_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Description</span>
                                    <span class="label-text-alt">(optional)</span>
                                </label>
                            </div>
                            <div class="col text-left">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-block text-center">
                            <a href="{{ route('downloads.index') }}"
                               class="btn btn-link" type="button">Cancel</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

{{--                        <div class="row mt-3 text-center">--}}
{{--                            <span>Note: Please follow the sample image below for uploading of data file to prevent unseen error.</span>--}}
{{--                            <div class="col mt-3">--}}
{{--                                <img src="{{ Vite::asset('resources/images/predicted_hi_lows_sample.PNG') }}"--}}
{{--                                     alt="" width="50%">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </form>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
        </script>
    @endpush()

@endsection
