@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col col-lg-3 py-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fa-solid fa-sort fa-4x"></i>
                        <h2 class="card-title mx-auto">Predicted Hi & Low Waters</h2>
                        <div class="card-actions justify-center mt-5">
                            <a href="{{ route('predicted_hi_lows.index') }}" class="btn btn-primary">Go Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 py-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fa-solid fa-water fa-4x"></i>
                        <h2 class="card-title mx-auto">Predicted Hourly Heights</h2>
                        <div class="card-actions justify-center mt-5">
                            <a href="{{ route('predicted_hourly_heights.index') }}" class="btn btn-primary">Go Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 py-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-cloud-sun fa-4x"></i>
                        <h2 class="card-title mx-auto">Sunrise Sunset</h2>
                        <div class="card-actions justify-center mt-5">
                            <a href="{{ route('sunrise-sunset.index') }}" class="btn btn-primary">Go Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 py-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fa-solid fa-map-location fa-4x"></i>
                        <h2 class="card-title mx-auto">Location Data</h2>
                        <div class="card-actions justify-center mt-5">
                            <a href="{{ route('location.index') }}" class="btn btn-primary">Go Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 py-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fa-solid fa-calendar-alt fa-4x"></i>
                        <h2 class="card-title mx-auto">Date Range</h2>
                        <div class="card-actions justify-center mt-5">
                            <a href="{{ route('date-range.index') }}" class="btn btn-primary">Go Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 py-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fa-solid fa-file-pdf fa-4x"></i>
                        <h2 class="card-title mx-auto">Downloadable Resources</h2>
                        <div class="card-actions justify-center mt-5">
                            <a href="{{ route('downloads.index') }}" class="btn btn-primary">Go Now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{--    <div class="container mx-auto">--}}
    {{--        <div class="hero bg-base-200 mt-5">--}}
    {{--            <div class="hero-content text-center">--}}
    {{--                <div class="max-w-xxl">--}}
    {{--                    <h1 class="text-5xl font-bold">Welcome to PHTides Web App</h1>--}}
    {{--                    <p class="py-6">Is there anything you want to do here?</p>--}}
    {{--                    <div class="grid grid-cols-4 gap-5">--}}
    {{--                        <div class="card bg-base-100 shadow-xl">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <i class="fa-solid fa-sort fa-4x"></i>--}}
    {{--                                <h2 class="card-title mx-auto">Predicted Hi & Low Waters</h2>--}}
    {{--                                <div class="card-actions justify-center mt-5">--}}
    {{--                                    <a href="{{ route('predicted_hi_low.index') }}" class="btn btn-primary">Go Now</a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="card bg-base-100 shadow-xl">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <i class="fa-solid fa-water fa-4x"></i>--}}
    {{--                                <h2 class="card-title mx-auto">Predicted Hourly Heights</h2>--}}
    {{--                                <div class="card-actions justify-center mt-5">--}}
    {{--                                    <a href="{{ route('predicted_hourly_heights.index') }}" class="btn btn-primary">Go Now</a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="card bg-base-100 shadow-xl">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <i class="fa-solid fa-map-location fa-4x"></i>--}}
    {{--                                <h2 class="card-title mx-auto">Location Data</h2>--}}
    {{--                                <div class="card-actions justify-center mt-5">--}}
    {{--                                    <a href="{{ route('location.index') }}" class="btn btn-primary">Go Now</a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="card bg-base-100 shadow-xl">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <i class="fa-solid fa-file-alt fa-4x"></i>--}}
    {{--                                <h2 class="card-title mx-auto">API Doc</h2>--}}
    {{--                                <div class="card-actions justify-center mt-5">--}}
    {{--                                    <a href="{{ route('api_doc.index') }}" class="btn btn-primary">Go Now</a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection
