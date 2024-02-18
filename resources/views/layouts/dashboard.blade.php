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

<body style="overflow: hidden;">
    <div class="d-flex" style="height:100vh;">
        <div class="menu h-100 p-3">
            <div class="card-- p-4 h-100 " style="overflow: scroll;">
                <div class="d-flex flex-column justify-content-between h-100" >
                    <a class="text-white nav-logo" href="{{ url('/') }}" style="font-size: 30px;"
                        style="height:10%;">
                        <img src="{{ asset('log6.png') }}" class="img-fluid me-1"
                            style="height:60px;margin-left:-10px;">
                        JaraBots
                    </a>

                    <div class="card--holder p-3 d-flex align-items-center justify-content-between w-100 rounded mt-4 mb-2" style="height:80px;">
                        <img src="{{ asset('th2.jpg') }}" class="img-fluid me-2 rounded-circle h-100">
                        <div class="d-flex flex-column justify-content-between text--black">
                            <span class="fs-5 text-white" style="height: min-content;">Klozon</span>
                            <span class="fs-6" style="height: min-content;font-size:80%;">csiszár</span>
                        </div>
                        <i class="text--neon ms-auto me-1 fa-solid fa-arrow-right-from-bracket"></i>

                    </div>


                    <div class="d-flex flex-column justify-content-around text--black w-100 rounded mt-2 mb-2"
                        style="height:160px;">
                        <div class="fs-5 ms-4">
                            <i class="fa-solid fa-house me-2" style="color:rgb(136, 224, 227);"></i><span
                                style="color:rgb(136, 224, 227);">Dashboard</span>
                        </div>
                        <div class="fs-5 ms-4">
                            <i class="fa-solid fa-robot me-2"></i><span>Bots</span>
                        </div>
                        <div class="fs-5 ms-4">
                            <i class="fa-regular fa-user me-2"></i><span>Your Profile</span>
                        </div>
                        <div class="fs-5 ms-4">
                            <i class="fa-solid fa-gear me-2"></i><span>Settings</span>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex mt-2 mb-3 w-100 justify-content-between ">
                        <span>Notifications</span>
                        <a class="text-secondary">View All ></a>
                    </div>
                    <div style="max-height:300px !important;"
                        class="d-flex mb-2 flex-column justify-content-between w-100 rounded  h-100 ">
                        <div
                            class="notification bg--pink rounded-3 flex-fill d-flex flex-column justify-content-between">
                            <span class="text-black fw-bold fs-6">Evetnt started</span>
                            <span class="text-black fs-6">XYZ server</span>
                            <span class="text-muted fs-6">01.23 16:00</span>
                        </div>
                        <div
                            class="notification bg--neon rounded-3 flex-fill mt-3 mb-3 d-flex flex-column justify-content-between">
                            <span class="text-black fw-bold fs-6">Evetnt started</span>
                            <span class="text-black fs-6">XYZ server</span>
                            <span class="text-muted fs-6">01.23 16:00</span>
                        </div>
                        <div
                            class="notification bg--yellow rounded-3 flex-fill d-flex flex-column justify-content-between">
                            <span class="text-black fw-bold fs-6">Evetnt started</span>
                            <span class="text-black fs-6">XYZ server</span>
                            <span class="text-muted fs-6">01.23 16:00</span>
                        </div>
                    </div>


                    <div class="text--neon w-100 text-center mt-auto">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i><a class="btn btn-link">Log Out</a>
                    </div>

                </div>
            </div>
        </div>


        <main class="p-5 w-100 h-100">
            @yield('content')


        </main>
    </div>

</body>

</html>
