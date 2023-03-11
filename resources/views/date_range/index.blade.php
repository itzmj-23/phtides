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
                        <label for="" class="col-sm-2 col-form-label">Minimum Date</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <input type="date" class="form-control" id="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Maximum Date</label>
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <input type="date" class="form-control" id="">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
