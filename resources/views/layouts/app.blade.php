<!doctype html>
<html lang="en" data-theme="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHTides Web App</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ Vite::asset('resources/images/ph_tides_logo.png') }}" width="120"
                 class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="{{ route('predicted_hi_lows.index') }}">Predicted Hi & Low Waters</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('predicted_hourly_heights.index') }}">Predicted Hourly Heights</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('location.index') }}">Locations</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('sunrise-sunset.index') }}">Sunrise/Sunset</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('date-range.index') }}">Date Range</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('downloads.index') }}">Downloadable Resources</a></li>
                    </ul>

                    <ul class="navbar-nav">
                        @if(auth()->user())
                            <li class="nav-item"><a href="#" class="nav-link disabled text-black">{{ __('Hi, ') . auth()->user()->name  }}</a></li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-link">{{ __('Logout') }}</button>
                                </form>
                            </li>
                        @endif
                    </ul>

        </div>
    </div>
</nav>

<div class="container-fluid">
    <section class="">

        <!-- Page content here -->
        @yield('content')

    </section>
</div>

@stack('scripts')
</body>
</html>
