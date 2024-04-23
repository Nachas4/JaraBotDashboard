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
    {{-- Ajax jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg--black overflow-hidden">
    <div class="d-flex vh-100">

        {{-- Sidebar Lable --}}
        <div class="d-flex justify-content-end bg--black rounded menu-mini d-lg-none pe-2" id="menu-mini" onclick="toggle()">
            <i class="fa-solid fa-bars fs-4 p-2"></i>
        </div>

        {{-- MENU  on Left --}}
        <div class="menu-closed h-100 p-3" style="z-index:10;" id="menu">
            <div class="card-- p-4 h-100 overflow-auto">
                <div class="d-flex flex-column justify-content-between h-100">

                    {{-- Menu Close Lable --}}
                    <i class="fa-solid fa-xmark fs-5 p-2 d-lg-none position-absolute"
                        style="right:15px; top:10px;cursor: pointer;" onclick="toggle()"></i>

                    {{-- Brand --}}
                    <a class="text-white nav-logo" href="{{ url('/') }}" style="font-size: 30px;">
                        <img src="{{ asset('log6.png') }}" class="img-fluid me-1"
                            style="height:60px;margin-left:-10px;">
                        JaraBots
                    </a>


                    {{-- User Data --}}
                    @auth
                        <div class="card--holder p-3 d-flex align-items-center w-100 rounded mb-2" style="height:80px;">
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
                    @endauth

                    @guest
                        <div class="card--holder p-3 d-flex align-items-center w-100 rounded mt-4 mb-2"
                            style="height:80px;">
                            <div class="d-flex flex-column justify-content-center h-100 align-items-start text--grey">
                                Not logged in.
                            </div>

                            {{-- Log Out --}}
                            <a href="{{ route('discord.login') }}" class="ms-auto login-button rounded">
                                <i class="text--neon mt-1 ms-2 fa-solid fa-arrow-right-to-bracket"></i>
                            </a>
                        </div>
                    @endguest


                    {{-- Navigation --}}
                    <div class="d-flex flex-column justify-content-around text--grey w-100 rounded mb-2"
                        style="height:160px;">
                        {{-- Modules --}}
                        <div class="fs-5 ms-4">
                            <a class="nav-btn text--teal" id="general" role="button">
                                <i class="fa-solid fa-house me-2"></i><span>General</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a class="nav-btn" id="moderation" role="button">
                                <i class="fa-solid fa-user-check me-2"></i><span>Moderation</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a class="nav-btn" id="fun" role="button">
                                <i class="fa-solid fa-face-laugh-wink me-2"></i><span>Fun</span>
                            </a>
                        </div>
                        <div class="fs-5 ms-4">
                            <a class="nav-btn" id="minigame" role="button">
                                <i class="fa-solid fa-gamepad me-2"></i><span>Duel Minigame</span>
                            </a>
                        </div>
                    </div>

                    <hr class="my-1">

                    {{-- Commands --}}
                    <div class="d-flex flex-column justify-content-around gap-2 text--grey w-100 rounded mt-2 mb-2">
                        <div class="commands" id="cmds-general">
                            <div class="fs-5 ms-5 my-1">
                                <span>Welcome Message</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Auto Responses</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Autoroles</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Server Settings</span>
                            </div>
                        </div>

                        <div class="commands d-none" id="cmds-moderation">
                            <div class="fs-5 ms-5 my-1">
                                <span>Mod Message Channels</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Mod Roles</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Moderators</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Server Settings</span>
                            </div>

                            <hr class="m-0 ms-3 my-1" style="width: 90%">

                            <div class="fs-5 ms-5 my-1">
                                <span>Kick</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Ban</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Timeout</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Quarantine</span>
                            </div>
                        </div>

                        <div class="commands d-none" id="cmds-fun">
                            <div class="fs-5 ms-5 my-1">
                                <span>Use Pickup Lines</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Get Quotes</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Pickup Lines</span>
                            </div>
                            <div class="fs-5 ms-5 my-1">
                                <span>Quotes</span>
                            </div>
                        </div>

                        <div class="commands d-none" id="cmds-minigame">
                            <div class="fs-5 ms-5 my-1">
                                <span>TBD</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-auto"></div>

                </div>
            </div>
        </div>


        {{-- Right  Side --}}
        <div class="h-100 w-100 p-3">
            <div class="card-- h-100 w-100 overflow-scroll">

                {{-- CONTENT --}}
                <div id="docs-container"></div>

            </div>
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
    const menu = document.getElementById('menu');
    const menumini = document.getElementById('menu-mini');

    const toggle = () => {
        menu.classList.toggle('menu-open');
        menumini.classList.toggle('menu-mini-closed');
    }

    //Dynamic page loading through controller
    const nav_btns = document.getElementsByClassName('nav-btn');
    const cmds = document.getElementsByClassName('commands');

    $(document).ready(function() {
        //Load the default module
        let url = "{{ route('doc.module', ['module' => ':module']) }}";
        url = url.replace(':module', 'general');
        $('#docs-container').load(url);

        for (const btn of nav_btns) {
            $(btn).on('click', function(button) {
                //Change nav button colors and {{-- Commands --}} part
                for (const btn_2 of nav_btns) {
                    if (this == btn_2) {
                        btn_2.classList.add('text--teal');

                        for (const cmd of cmds) cmd.classList.add('d-none');

                        $(`#cmds-${this.id}`).removeClass('d-none');

                        continue;
                    }

                    btn_2.classList.remove('text--teal');
                }

                //Load the requested module
                let routeName = $(this).attr('id');
                let url = "{{ route('doc.module', ['module' => ':module']) }}";
                url = url.replace(':module', routeName);
                $('#docs-container').load(url);
            });
        }
    });
</script>
