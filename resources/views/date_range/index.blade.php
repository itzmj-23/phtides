@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="hero mt-5 text-center">
            <h1 class="text-5xl font-bold">Date Range</h1>
        </div>

        <div class="card bg-base-100 shadow-xl mt-4">
            <div class="card-body">
                <form action="{{ route('date-range.update') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Last Minimum Date</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <input class="form-control" type="text" value="{{ $data->min_date ?? 'No data yet' }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="min_date" class="col-sm-2 col-form-label">Minimum Date</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <input type="date" class="form-control @error('min_date') is-invalid @enderror" id="min_date" name="min_date" min="2010-01-01" max="9999-12-31">
                            @error('min_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Last Maximum Date</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <input class="form-control" type="text" value="{{ $data->max_date ?? 'No data yet.' }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="max_date" class="col-sm-2 col-form-label">Maximum Date</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <input type="date" class="form-control @error('max_date') is-invalid @enderror" id="max_date" name="max_date" min="2010-01-01" max="9999-12-31">
                            @error('max_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Last Update By</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <input class="form-control" type="text" value="{{ $data->updated_by ?? 'No data yet.' }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Update By</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <input class="form-control" type="text" name="updated_by" value="{{ auth()->user()->email }}" readonly>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <a href="/">Cancel</a>
                            <button class="btn btn-primary mx-3" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
