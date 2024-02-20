<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- Counter animation --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js"></script>
    {{-- Charts --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg--greyd">
    <div class="d-flex w-100 flex-column justify-content-between" style="min-height: 100vh;">

        <div class="mb-5" id="app">
            {{-- NAV --}}
            <div class="d-flex justify-content-center ">
                <nav class="navbar navbar-expand-md navbar-light text-center float-nav">
                    <div class="container">
                        <div class="d-flex w-100 align-items-center mb-5">
                            <div class="c-1" style="--height:1;"></div>
                            <div class="c-1" style="--height:2;"></div>
                            <div class="c-1" style="--height:3;"></div>
                            <a class="text-white nav-logo" href="{{ url('/') }}">
                                Jara
                                <img src="{{asset('log6.png')}}" class="img-fluid" style="margin:0 -10px; height:160px;">
                                Bots
                            </a>
                            <div class="c-1" style="--height:3;"></div>
                            <div class="c-1" style="--height:2;"></div>
                            <div class="c-1" style="--height:1;"></div>
                        </div>
                    </div>
                </nav>
            </div>


            {{-- CONTENT --}}
            <main class="py-4 pt-0">
                @yield('content')
            </main>
        </div>

        {{-- FOOTER --}}
        <footer class="align-self-end w-100 p-3 " style="height: 140px; background:#0f0f0f; position: relative;">
            <a href="#" class="btn btn-primary button" style="position: absolute; right:20px;bottom:20px;"><i class="fa-solid fa-arrow-up"></i></a>
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <div class="d-flex flex-column">
                            <h5>Contacts</h5>
                            <span>Klozon - klozon0@gmail.com</span>
                            <span>Nachas4 - nachas4@tuta.io</span>
                            <span>Hason4 - lorem</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="d-flex flex-column">
                            <h5> <i class="fa-brands fa-github"></i>  Github</h5>
                            
                            <a class="footer-link" target="_blank" href="https://github.com/Klozon-cs">Klozon</a>
                            <a class="footer-link" target="_blank" href="https://github.com/Nachas4">Nachas4</a>
                            <a class="footer-link" target="_blank" href="https://github.com/Hason42069">Hason42069</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>
