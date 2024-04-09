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

<body class="bg--black overflow-hidden">
    <div class="d-flex vh-100">

        {{-- Sidebar Lable --}}
        <div class="d-flex justify-content-end bg--black rounded menu-mini d-lg-none" id="menu-mini" onclick="toggle()">
            <i class="fa-solid fa-bars fs-4 p-2"></i>
        </div>

        {{-- MENU  on Left --}}
        <div class="menu-closed h-100 p-3" style="z-index:10;" id="menu">
            <div class="card-- p-4 h-100 overflow-auto">
                <div class="d-flex flex-column justify-content-between h-100">

                    {{-- Menu Close Lable --}}
                    <i class="fa-solid fa-minus fs-5 p-2 d-lg-none position-absolute"
                        style="right:10px; top:20px;cursor: pointer;" onclick="toggle()"></i>

                    {{-- Brand --}}
                    <a class="text-white nav-logo" href="{{ url('/') }}" style="font-size: 30px;">
                        <img src="{{ asset('log6.png') }}" class="img-fluid me-1"
                            style="height:60px;margin-left:-10px;">
                        JaraBots
                    </a>


                    {{-- User Datas --}}
                    <div class="card--holder p-3 d-flex align-items-center w-100 rounded mt-4 mb-2"
                        style="height:80px;">
                        <img src="{{ asset('pfp-2.jpg') }}" class="img-fluid me-2 rounded-circle h-100">
                        <div class="d-flex flex-column justify-content-center h-100 align-items-start text--grey">
                            <span class="fs-5 text-white"
                                style="height: min-content; margin-bottom:-10px;">Klozon</span>
                            <span class="fs-6" style="height: min-content;font-size:80%;">csiszár</span>
                        </div>

                        {{-- Log Out --}}
                        <a href="" class="ms-auto ">
                            <i class="text--neon me-1 fa-solid fa-arrow-right-from-bracket"></i>
                        </a>
                    </div>


                    {{-- Navigation --}}
                    <div class="d-flex flex-column justify-content-around text--grey w-100 rounded mt-2 mb-2"
                        style="height:160px;">
                        <div class="fs-5 ms-4">
                            <a href="">
                                <i class="fa-solid fa-list me-2" style="color:rgb(136, 224, 227);"></i><span
                                    style="color:rgb(136, 224, 227);">Dashboard</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a href="">
                                <i class="fa-solid fa-robot me-2"></i><span>Bots</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a href="">
                                <i class="fa-regular fa-user me-2"></i><span>Your Profile</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a href="">
                                <i class="fa-solid fa-gear me-2"></i><span>Settings</span>
                            </a>
                        </div>
                    </div>
                    <hr>

                    {{-- Notifications --}}
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



                    {{-- Log Out --}}
                    <div class="text--neon w-100 text-center mt-auto">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <a href="" class="btn btn-link">LogOut</a>
                    </div>

                </div>
            </div>
        </div>










        {{-- Right  Side --}}
        <div class="d-flex flex-column p-3 flex-fill">

            {{-- <div class="card-- d-flex justify-content-start p-3 w-100" style="width: 100%;height: 150px; gap:15px;overflow:scroll; ">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list rounded">

                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
                <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded">
            </div> --}}

            {{-- SERVERS SLIDER --}}
            <div class="card-- p-3 mb-4 w-100" style="height: 150px;z-index:2;">
                <div class="d-flex justify-content-start h-100 w-100 overflow-auto" style="overflow-y: hidden;"
                    id="servers">

                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">
                    <img src="{{ asset('pfp-1.png') }}" alt="" class="server--list img-fluid rounded"
                        draggable="false">


                </div>
            </div>
            <main class="w-100 h-100">
                <div class="card-- d-flex flex-column w-100 h-100">
                    {{-- CONTENT --}}
                    @yield('content')


                    {{-- Card Dasboard Sample --}}
                    {{-- <div class="card-- d-flex flex-column w-100 h-100">
                        <div class="card--header text-white p-2 mb-3">
                            <div class="row">
                                <div class="col-3 text-decoration-underline"><b>Some shit</b></div>
                                <div class="col-3">fuck this</div>
                                <div class="col-3">CSS -_-</div>
                                <div class="col-3">sdf</div>
                            </div>
                        </div>
                        <div class="card--body p-3 h-100 text-white rounded">
                            
                        </div>
                    </div> --}}

                </div>
            </main>
        </div>
    </div>

</body>

</html>

<style>
    @media screen and (max-width: 992px) {
        .menu-closed {
            transform: translateX(-100%);
            position: absolute;
        }
    }

    @media screen and (max-width: 576px) {
        .menu-open {
            min-width: 100vw;
        }
    }
</style>

<script>
    //horizontal scrolling with mouse wheel
    let servers = document.getElementById('servers');
    servers.addEventListener("wheel", function(e) {
        if (e.wheelDelta > 0) {
            console.log(e);
            this.scrollLeft -= 30;
        } else {
            this.scrollLeft += 30;
        }
    }, {
        passive: true
    });

    //Toggle Menu
    let menu = document.getElementById('menu');
    let menumini = document.getElementById('menu-mini');

    let toggle = () => {
        menu.classList.toggle('menu-open');
        menumini.classList.toggle('menu-mini-closed');
    }
</script>
