<!doctype html>
<html lang="en" data-theme="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHTides Web App</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="drawer">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col">
        <!-- Navbar -->
        <div class="w-full navbar bg-base-30">
            <div class="flex-none lg:hidden">
                <label for="my-drawer-3" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </label>
            </div>
            <div class="flex-1 px-2 mx-2"><a href="/">
                    <img src="{{ Vite::asset('resources/images/ph_tides_logo.png') }}" alt="" class="w-32">
                </a></div>
            <div class="flex-none hidden lg:block">
                <ul class="menu menu-horizontal">
                    <!-- Navbar menu content here -->
                    <li><a href="{{ route('tide_prediction.index') }}">Tide Prediction Data</a></li>
                    <li><a href="{{ route('location.index') }}">Location Data</a></li>
                    <li><a href="{{ route('api_doc.index') }}">API Doc</a></li>
                </ul>
            </div>
        </div>
        <!-- Page content here -->

        @yield('content')

    </div>
    <div class="drawer-side">
        <label for="my-drawer-3" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 bg-base-100">
            <!-- Sidebar content here -->
            <li><a>Sidebar Item 1</a></li>
            <li><a>Sidebar Item 2</a></li>

        </ul>

    </div>
</div>
</body>
</html>
