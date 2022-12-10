@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="hero bg-base-200 mt-5">
            <div class="hero-content text-center">
                <div class="max-w-xxl">
                    <h1 class="text-5xl font-bold">Welcome to PHTides Web App</h1>
                    <p class="py-6">Is there anything you want to do here?</p>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="card bg-base-100 shadow-xl">
                            <div class="card-body">
                                <i class="fa-solid fa-water fa-4x"></i>
                                <h2 class="card-title mx-auto">Tide Prediction Data</h2>
                                <div class="card-actions justify-center mt-5">
                                    <a href="{{ route('tide_prediction.index') }}" class="btn btn-primary">Go Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-base-100 shadow-xl">
                            <div class="card-body">
                                <i class="fa-solid fa-map-location fa-4x"></i>
                                <h2 class="card-title mx-auto">Location Data</h2>
                                <div class="card-actions justify-center mt-5">
                                    <a href="{{ route('location.index') }}" class="btn btn-primary">Go Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
