@extends('layouts.app')

@section('content')
    <div style="position: relative;">
        <div class="svg-holder d-none d-md-block">
            <img src="{{ asset('images/background.svg') }}"></img>
        </div>

        <div class="container text-white" style="position:relative;">
            <div class="row pe-2 ps-2">

                <div class="col-lg-4 col-sm-12 col-md-6 col-12 pb-4 text-center order-md-2 order-lg-0 order-2">
                    <div class="card--" style="background-color: #212529aa;">
                        <div class="shape"></div>
                        <div class="shape"></div>
                        <div class="shape"></div>
                        <div class="shape"></div>
                        @auth
                            <div class="d-flex flex-column h-100 align-items-center" style="position: relative">
                                <div class="mt-1 mb-2 d-flex align-items-center justify-content-center logo">
                                    <i class="fa-solid fa-sliders text-white"
                                        style="font-size: 60px; width: auto !important"></i>
                                </div>
                                <h1>Go to the Dashboard</h1>

                                {{-- User Data --}}
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
                                        <i class="text--neon mt-1 fa-solid fa-arrow-right-from-bracket"></i>
                                    </a>
                                </div>

                                <p class="card--p mt-2">See all the features and settings our Dashboard offers.</p>
                                @php
                                    $server = Auth::user()->owned_guilds()->first()->guild_id ?? '69';
                                @endphp
                                <a href="{{ route('dashboard.general', ['server' => $server]) }}"
                                    class="btn btn-primary button mt-auto">Dashboard</a>
                            </div>
                        @endauth

                        @guest
                            <div class="d-flex flex-column h-100 align-items-center" style="position: relative">
                                <div class="mt-1 mb-2  d-flex align-items-center justify-content-center logo">
                                    <i class="fa-brands fa-discord text-white"></i>
                                </div>
                                <h1>Login with Discord</h1>
                                <p class="card--p">Login using your discord account to access your Dashboard. Also, if you don't
                                    have a server of your own, you won't be able to access it.</p>
                                <a href="{{ route('discord.login') }}" class="btn btn-primary button mt-auto">Login</a>
                            </div>
                        @endguest
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-md-12 col-12 pb-md-3 pb-4 text-center order-md-1 order-lg-0 order-1">
                    <div class="card-- pt-5">
                        <h1>Welcome!</h1>
                        <p class="card--p">Welcome to Our Discord Bot Dashboard! 🤖</p>
                        <p class="card--p">Look at the available commands and settings in the Documentation, or hop right
                            into it by going
                            to the Dashboard.</p>
                        <p class="card--p">We know very well how much work it requires to keep a Discord Community safe,
                            engaged and
                            managed. This is what Our simple JaraBot is perfect for; hassle-free management!</p>
                        <p class="card--p">Our dashboard provides you with intuitive tools for JaraBot on your server. </p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-md-6 col-12 pb-4 text-center order-md-3 order-lg-0 order-3">
                    <div class="card--" style="background-color: #212529aa;">
                        <div class="shape"></div>
                        <div class="shape"></div>
                        <div class="shape"></div>
                        <div class="shape"></div>
                        <div class="d-flex flex-column h-100 align-items-center" style="position: relative">
                            <div class="mt-1 mb-2 logo d-flex align-items-center justify-content-center ">
                                <i class="fa-solid fa-book text-white" style="font-size: 60px; width: auto !important"></i>
                            </div>
                            <h1>Documentation</h1>
                            <p class="card--p mb-0">Want to know how something works? </p>
                            <p class="card--p">Take a peek inside.</p>
                            <a href="{{ route('docs') }}" class="btn btn-primary button mt-auto">Learn More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="card--holder w-100 mb-5 p-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>🤖 About Us 🌟</h1>
                </div>
                <div class="col-12">
                    <p>Welcome to Jarabots, your destination for Discord Bot management!</p>
                    <p><b>We had a goal in mind:</b> we wanted to create a user-friendly way to manage you Discod Server
                        without
                        having to use Discord Bots with lots of unnecessary and unneeded tools built into them. We also
                        understand the unique challenges that come with running a Discord server, so we have made an
                        easy-to-use bot with a
                        matching easy-to-use dashboard.
                    </p>
                    <p>Thank you for choosing Jarabots. Let's build something amazing together!</p>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-5 mb-5 d-none d-md-block">‎ </div>


    {{-- STATISTIC --}}
    <div class="container mb-5 mt-5 mb-md-5 d-none" style="padding-top: 1px !important;">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-lg-0 mb-sm-3 pb-3">
                <div class="card--small h-100">
                    <canvas id="barchart" class=""></canvas>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mb-md-3 mb-sm-3">
                <div class="card--small h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3  mb-md-0">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <h3><i class="fa-solid fa-ranking-star"></i> XYZ Top players</h3>
                                    <div class="card--list d-flex align-item-center">
                                        <img src="{{ asset('pfp-2.jpg') }}" class="img-fluid me-2 rounded-circle">
                                        <div class="d-flex flex-wrap">
                                            <span class="align-self-center" style="height: min-content;">Coffee ‎</span>
                                            <span class="align-self-center" style="height: min-content;">120 win</span>
                                        </div>
                                    </div>
                                    <div class="card--list d-flex align-item-center">
                                        <img src="{{ asset('pfp-2.jpg') }}" class="img-fluid me-2 rounded-circle">
                                        <div class="d-flex flex-wrap">
                                            <span class="align-self-center" style="height: min-content;">Coffee ‎</span>
                                            <span class="align-self-center" style="height: min-content;">120 win</span>
                                        </div>
                                    </div>
                                    <div class="card--list d-flex align-item-center">
                                        <img src="{{ asset('pfp-2.jpg') }}" class="img-fluid me-2 rounded-circle">
                                        <div class="d-flex flex-wrap">
                                            <span class="align-self-center" style="height: min-content;">Coffee ‎</span>
                                            <span class="align-self-center" style="height: min-content;">120 win</span>
                                        </div>
                                    </div>
                                    <div class="card--list d-flex align-item-center">
                                        <img src="{{ asset('pfp-2.jpg') }}" class="img-fluid me-2 rounded-circle">
                                        <div class="d-flex flex-wrap">
                                            <span class="align-self-center" style="height: min-content;">Coffee ‎</span>
                                            <span class="align-self-center" style="height: min-content;">120 win</span>
                                        </div>
                                    </div>
                                    <div class="card--list d-flex align-item-center">
                                        <img src="{{ asset('pfp-2.jpg') }}" class="img-fluid me-2 rounded-circle">
                                        <div class="d-flex flex-wrap">
                                            <span class="align-self-center" style="height: min-content;">Coffee ‎</span>
                                            <span class="align-self-center" style="height: min-content;">120 win</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row m-0 h-100 text-center">
                                    <div class="card-- col-lg-12 col-md-12 col-sm-12 col-12 flex-fill mb-3"
                                        style="height: auto; box-sizing: border-box; z-index:1; ">
                                        <div
                                            class="d-flex justify-content-center flex-column align-items-center h-100 text-white">
                                            <h3 class="">Commands count</h3>
                                            {{-- <div class="odometer" id="odometer">0</div> --}}
                                            <h2>34971</h2>
                                        </div>
                                    </div>
                                    <div class="card-- col-lg-12 col-md-12 col-sm-12 col-12 flex-fill"
                                        style="height: auto;  z-index:1;">
                                        <div
                                            class="d-flex justify-content-center flex-column align-items-center h-100 text-white">
                                            <h3>Commands count</h3>
                                            {{-- <div class="odometer" id="odometer">0</div> --}}
                                            <h2>34971</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="mt-5 mb-5 d-none d-md-block">‎ </div> --}}


    <div class="card--holder w-100 d-flex flex-column align-items-center justify-content-center mt-5 h-100 pt-5 pb-5 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 mb-4 member">
                    <div class="d-flex flex-column rounded overflow-hidden">
                        <div class="member-img">
                            <img src="{{ asset('pfp-1.png') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href="mailto: nachas4@tuta.io">
                                    <i class="fa-solid fa-envelope text-black"></i>
                                </a>
                                <a href="https://github.com/Nachas4" target="_blank">
                                    <i class="fa-brands fa-github text-black"></i>
                                </a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Nachas4</h4>
                            <span>Site backend and frontend</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mb-4 member">
                    <div class="d-flex flex-column rounded overflow-hidden">
                        <div class="member-img">
                            <img src="{{ asset('pfp-2.jpg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href="mailto: klozon0@gmail.com">
                                    <i class="fa-solid fa-envelope text-black"></i></i>
                                </a>
                                <a href="https://github.com/Klozon-cs" target="_blank">
                                    <i class="fa-brands fa-github text-black"></i>
                                </a>

                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Klozon</h4>
                            <span>Site backend and frontend</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mb-4 member">
                    <div class="d-flex flex-column rounded overflow-hidden">
                        <div class="member-img">
                            <img src="{{ asset('pfp-3.png') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href="mailto: lionsdalestudio@gmail.com">
                                    <i class="fa-solid fa-envelope text-black"></i>
                                </a>
                                <a href="https://github.com/Hason42069" target="_blank">
                                    <i class="fa-brands fa-github text-black"></i>
                                </a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Hason4</h4>
                            <span>Creation of JaraBot</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="mt-5 mb-5 d-none d-md-block">‎ </div> --}}




    <style>
        /* NAV */
        @media screen and (max-width: 770px) {
            .c-1 {
                display: none !important;
            }

            .nav-logo {
                padding: 10px 25px;
                font-size: 80px;
                margin: 0px;
                margin-bottom: -30px;

            }

            .nav-logo img {
                height: 120px !important;
            }
        }

        @media screen and (max-width: 450px) {
            .c-1 {
                display: none !important;
            }

            .nav-logo {
                padding-left: 20px;
                font-size: 70px;
            }

            .nav-logo img {
                height: 110px !important;
            }
        }
    </style>

    <script>
        //Chart loader
        const ctx = document.getElementById('barchart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 11, 7, 5, 8, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
