<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PH TIDES - Privacy Policy</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <style>
        html {
            font-family: 'Open Sans', sans-serif;
        }
        body {
            margin: 50px 100px;
        }

        .main {
            display: flex;
            justify-content: center;
        }

        .padding-xs {
            padding: 1px 3px;
        }

        /* Mobile Phones*/
        @media (min-width: 320px){
            body {
                margin: 20px 20px;
            }
        }

        /* Tablets */
        @media (min-width: 768px){
            body {
                margin: 25px 30px;
            }
        }

        /* Laptops and Desktop Low Resolution */
        @media (min-width: 1024px){
            body {
                margin: 30px 50px;
            }
        }

        /* Desktop, Large Screens*/
        @media (min-width: 1200px){
            body {
                margin: 50px 100px;
            }
        }
    </style>

</head>
<body>

<div class="main">
    <div class="padding-xs">
        <img src="{{ Vite::asset('resources/images/namria_logo.png') }}" width="120"
             class="text-center">
    </div>
    <div class="padding-xs">
        <img src="{{ Vite::asset('resources/images/ph_tides_logo.png') }}" width="120"
             class="text-center">
    </div>
</div>

{!! $data['policy'] !!}

</body>
</html>
