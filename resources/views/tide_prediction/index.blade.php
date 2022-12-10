@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="hero bg-base-200 mt-5">
            <div class="hero-content text-center">
                <div class="max-w-xxl">
                    <h1 class="text-5xl font-bold">Tide Prediction Data</h1>
                    <p class="py-6">Tide Predication Data Management begins here</p>
                </div>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl mt-5">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <h2 class="card-title">Lists of Data</h2>
                    <div class="card-actions justify-end">
                        <a href="{{ route('tide_prediction.create') }}" class="btn btn-primary">Add Data</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
