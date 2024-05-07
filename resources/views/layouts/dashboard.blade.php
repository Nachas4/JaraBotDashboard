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

    {{-- Multi Select --}}
    {{-- https://github.com/habibmhamadi/multi-select-tag --}}
    <script src="{{ asset('js/multi-select-tag.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/multi-select-tag.css') }}">

    {{-- jQuery --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg--black overflow-hidden">
    <div class="d-flex vh-100">

        {{-- Sidebar Lable --}}
        <div class="d-flex justify-content-end bg--black rounded menu-mini d-lg-none pe-2" id="menu-mini"
            onclick="toggle()">
            <i class="fa-solid fa-bars fs-4 p-2"></i>
        </div>

        {{-- MENU  on Left --}}
        <div class="menu-closed h-100 p-3" style="z-index:10;" id="menu">
            <div class="card-- p-4 h-100 overflow-auto">
                <div class="d-flex flex-column justify-content-start h-100">

                    {{-- Menu Close Lable --}}
                    <i class="fa-solid fa-xmark fs-5 p-2 d-lg-none position-absolute"
                        style="right:15px; top:10px;cursor: pointer;" onclick="toggle()"></i>

                    {{-- Brand --}}
                    <a class="text-white nav-logo" href="{{ route('welcome') }}" style="font-size: 30px;">
                        <img src="{{ asset('log6.png') }}" class="img-fluid me-1"
                            style="height:60px;margin-left:-10px;">
                        JaraBots
                    </a>



                    {{-- User Data --}}
                    <div class="card--holder p-3 d-flex align-items-center w-100 rounded mt-4 mb-2"
                        style="height:80px;">
                        <img src="{{ 'https://cdn.discordapp.com/avatars/' . Auth()->user()->user_id . '/' . Auth()->user()->avatar }}"
                            class="img-fluid me-2 rounded-circle h-100">
                        <div class="d-flex flex-column justify-content-center h-100 align-items-start text--grey">
                            <span class="fs-5 text-white"
                                style="height: min-content; margin-bottom:-10px;">{{ Auth()->user()->global_name }}</span>
                            <span class="fs-6"
                                style="height: min-content;font-size:80%;">{{ Auth()->user()->username }}</span>
                        </div>

                        {{-- Log Out --}}
                        <a href="{{ route('logout') }}" class="ms-auto logout-button rounded">
                            <i class="text--neon mt-1 ms-2 fa-solid fa-arrow-right-from-bracket"></i>
                        </a>
                    </div>

                    {{-- Navigation --}}
                    <div class="d-flex flex-column justify-content-around text--grey w-100 rounded mt-2 mb-2"
                        style="height:160px;">
                        <div class="fs-5 ms-4">
                            <a>
                                <i class="fa-solid fa-house me-2" style="color:rgb(136, 224, 227);"></i><span
                                    style="color:rgb(136, 224, 227);">Dashboard</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a href="{{ route('docs', '') }}">
                                <i class="fa-solid fa-book me-2"></i><span>Documentation</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a>
                                <i class="fa-regular fa-user me-2"></i><span>Your Profile</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a>
                                <i class="fa-solid fa-gear me-2"></i><span>Settings</span>
                            </a>
                        </div>
                    </div>
                    <hr>


                    <div class="text--black">
                        {{-- Modules --}}
                        <a href="{{ route('dashboard.general', $server) }}">
                            <div
                                class="notification bg--teal rounded-3 fs-5 mb-2 @if ($page == 'general') border-active fw-bold @endif">
                                <i class="fa-solid fa-list me-2"></i><span>General</span>
                            </div>
                        </a>
                        <a href="{{ route('dashboard.moderation', $server) }}">
                            <div
                                class="notification bg--pink rounded-3 fs-5 mb-2 @if ($page == 'moderation') border-active fw-bold @endif">
                                <i class="fa-solid fa-user-check me-2 "></i><span>Moderation</span>
                            </div>
                        </a>
                        <a href="{{ route('dashboard.fun', $server) }}">
                            <div
                                class="notification bg--neon rounded-3 fs-5 mb-2 @if ($page == 'fun') border-active fw-bold @endif">
                                <i class="fa-solid fa-face-laugh-wink me-2"></i><span>Fun</span>
                            </div>
                        </a>
                        <a href="{{ route('dashboard.minigame', $server) }}">
                            <div
                                class="notification bg--yellow rounded-3 fs-5 mb-2 @if ($page == 'minigame') border-active fw-bold @endif">
                                <i class="fa-solid fa-gamepad me-2"></i><span>Duel Minigame</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right  Side --}}
        <div class="d-flex flex-column p-3 flex-fill">

            {{-- SERVERS SLIDER --}}
            <div class="card-- p-3 mb-4 w-100" style="height: 140px;z-index:2;">
                <div class="d-flex justify-content-start h-100 w-100 overflow-auto" style="overflow-y: hidden;"
                    id="servers">

                    @foreach (Auth::user()->owned_guilds as $item)
                        @if (str_contains($item->icon, 'placeholder'))
                            <img onclick="{{ route('dashboard.general', $item->guild_id) }}"
                                src="{{ asset('storage/placeholders/PH_image_square.png') }}"
                                alt="{{ $item->name }}" class="server--list img-fluid rounded" draggable="false"
                                style="cursor: pointer;">
                        @else
                            <img onclick="{{ route('dashboard.general', $item->guild_id) }}"
                                src="https://cdn.discordapp.com/icons/{{ $item->guild_id }}/{{ $item->icon }}"
                                alt="{{ $item->name }}" class="server--list img-fluid rounded" draggable="false"
                                style="cursor: pointer;">
                        @endif
                    @endforeach
                </div>
            </div>
            <main class="w-100 h-100">
                <div class="card-- d-flex flex-column w-100 h-100 pe-0">
                    {{-- CONTENT --}}
                    @yield('content')

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

    @media screen and (max-height: 755px) {
        #invisible-gap {
            display: block !important;
        }
    }
</style>

<script>
    //horizontal scrolling with mouse wheel
    let servers = document.getElementById('servers');
    servers.addEventListener("wheel", function(e) {
        if (e.wheelDelta > 0) {
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
