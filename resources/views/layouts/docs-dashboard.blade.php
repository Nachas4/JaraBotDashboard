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
                                <i class="fa-solid fa-house me-2" style="color:rgb(136, 224, 227);"></i><span
                                    style="color:rgb(136, 224, 227);">General</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a href="">
                                <i class="fa-solid fa-user-check me-2"></i><span>Moderation</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a href="">
                                <i class="fa-solid fa-face-laugh-wink me-2"></i><span>Fun</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a href="">
                                <i class="fa-solid fa-gamepad me-2"></i><span>Duel Minigame</span>
                            </a>
                        </div>
                    </div>
                    <hr>

                    <div class="d-flex flex-column justify-content-around text--grey w-100 rounded mt-2 mb-2"
                        style="height:160px;">
                        <div class="fs-5 ms-5">
                            <span>Prefix</span>
                        </div>
                        <div class="fs-5 ms-5">
                            <span>Welcome Message</span>
                        </div>
                        <div class="fs-5 ms-5">
                            <span>Autorole</span>
                        </div>
                        <div class="fs-5 ms-5">
                            <span>Automessage</span>
                        </div>
                    </div>

                    <div class="mt-auto"></div>

                </div>
            </div>
        </div>


        {{-- Right  Side --}}
        <div class="d-flex flex-column p-3 flex-fill">

            {{-- SERVERS SLIDER --}}
            <main class="w-100 h-100">
                <div class="card-- d-flex flex-column w-100 h-100">

                    {{-- CONTENT --}}
                    <div>
                        @yield('general-doc')
                    </div>

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
    //Toggle Menu
    let menu = document.getElementById('menu');
    let menumini = document.getElementById('menu-mini');

    let toggle = () => {
        menu.classList.toggle('menu-open');
        menumini.classList.toggle('menu-mini-closed');
    }
</script>
