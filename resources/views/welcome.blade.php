@extends('layouts.app')

@section('content')
    <div style="position: relative;">
        <div class="svg-holder d-none d-md-block">
            <img src="{{ asset('images/background.svg') }}"></img>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{-- TODO: format --}}
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                                <a href="{{ route('dashboard.general', ['server' => 'asdasdasd']) }}"
                                    class="btn btn-primary button mt-auto">Dashboard</a>
                            </div>
                        @endauth

                        @guest
                            <div class="d-flex flex-column h-100 align-items-center" style="position: relative">
                                <div class="mt-1 mb-2  d-flex align-items-center justify-content-center logo">
                                    <i class="fa-brands fa-discord text-white"></i>
                                </div>
                                <h1>Login with Discord</h1>
                                <p class="card--p">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem rerum quia
                                    fugit excepturi
                                    cum.
                                    Quidem,
                                    ullam! Magni reiciendis veniam porro ipsam aperiam eaque repudiandae fuga libero, tempore
                                    vel?</p>
                                <a href="{{ route('discord.login') }}" class="btn btn-primary button mt-auto">Login</a>
                            </div>
                        @endguest
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-md-12 col-12 pb-md-3 pb-4 text-center order-md-1 order-lg-0 order-1">
                    <div class="card-- pt-5">
                        <h1>Welcome</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem rerum quia fugit
                            excepturi cum.
                            Quidem,
                            ullam! Magni reiciendis veniam porro ipsam aperiam eaque repudiandae fuga libero, tempore cumque
                            temporibus vel?</p>
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
                            <p class="card--p">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem rerum quia
                                fugit excepturi
                                cum.
                                Quidem,
                                ullam! Magni reiciendis veniam porro ipsam aperiam eaque repudiandae fuga libero, tempore
                                vel?</p>
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
                    <h1>About Us</h1>
                </div>
                <div class="col-12">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, perspiciatis laborum illum
                        placeat pariatur aliquam. Maxime necessitatibus impedit exercitationem. Saepe modi facilis velit?
                        Accusamus ipsam minima, dolorem ut illum nobis!
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id unde animi ipsum assumenda earum
                        asperiores numquam hic a laboriosam sed quasi quod, nostrum, nobis temporibus esse necessitatibus
                        voluptates modi ipsam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti delectus tempore dolores illo,
                        aperiam possimus eos quaerat animi voluptatum iste, sapiente quas culpa sed est vitae aut nisi
                        assumenda perspiciatis.
                    </p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt error voluptas blanditiis fugit ut
                        consequuntur ullam voluptatum natus maxime, quis vero, alias iste. Consectetur ad unde inventore
                        maiores vel laborum.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-5 mb-5 d-none d-md-block">‎ </div>


    {{-- STATISRIC --}}
    <div class="container mb-5 mt-5 mb-md-5" style="padding-top: 1px !important;">
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

    <div class="mt-5 mb-5 d-none d-md-block">‎ </div>


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
                            <span>Backend</span>
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
                            <span>Frontend</span>
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
                            <span>Javascript</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 mb-5 d-none d-md-block">‎ </div>




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
