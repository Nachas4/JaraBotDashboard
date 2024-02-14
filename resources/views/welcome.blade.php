@extends('layouts.app')

@section('content')
    <div class="container text-white mb-5">
        <div class="row">
            <div class="col-lg-4 col-sm-12 col-md-6 col-12 pb-5 text-center">
                <div class="card--">
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="mt-1 mb-2 logo d-flex align-items-center justify-content-center">
                        <i class="fa-brands fa-github"></i>
                    </div>
                    <h1>Github</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam ut facere velit illo. Accusamus
                        magnam nobis quam quas ipsum voluptatem suscipit quae, ut neque error ratione dicta laboriosam alias
                        eius.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-6 col-12 pb-4 text-center">
                <div class="card--">
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="mt-1 mb-2 logo d-flex align-items-center justify-content-center">
                        <i class="fa-brands fa-discord text-white"></i>
                    </div>
                    <h1>Login with Discord</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem rerum quia fugit excepturi cum.
                        Quidem,
                        ullam! Magni reiciendis veniam porro ipsam aperiam eaque repudiandae fuga libero, tempore cumque
                        temporibus vel?</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-12 col-12 pb-4 text-center">
                <div class="card--">
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="mt-1 mb-2 logo d-flex align-items-center justify-content-center">
                        <i class="fa-brands fa-unity"></i>
                    </div>
                    <h1>Unity</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque dolores incidunt culpa velit alias
                        autem facilis et voluptatum ab, beatae est consequatur harum. Placeat dignissimos, alias ab magni
                        blanditiis cupiditate?</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-md-3 mb-sm-3">
                <div class="card--small">
                    <canvas id="barchart"></canvas>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mb-md-3 mb-sm-3">
                <div class="card--small h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-sm-3">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <h3><i class="fa-solid fa-ranking-star"></i> XYZ Top players</h3>
                                    <div class="card--list">
                                        <img src="{{ asset('th2.jpg') }}" class="img-fluid rounded-circle"> <span
                                            class="ml-2">Coffee - 120 win</span>
                                    </div>
                                    <div class="card--list">
                                        <img src="{{ asset('th2.jpg') }}" class="img-fluid  rounded-circle"> <span
                                            class="ml-2">Coffee - 98 win</span>
                                    </div>
                                    <div class="card--list">
                                        <img src="{{ asset('th2.jpg') }}" class="img-fluid rounded-circle"> <span
                                            class="ml-2">Coffee - 75 win</span>
                                    </div>
                                    <div class="card--list">
                                        <img src="{{ asset('th2.jpg') }}" class="img-fluid rounded-circle"> <span
                                            class="ml-2">Coffee - 53 win</span>
                                    </div>
                                    <div class="card--list">
                                        <img src="{{ asset('th2.jpg') }}" class="img-fluid rounded-circle"> <span
                                            class="ml-2">Coffee - 49 win</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row m-0 h-100">
                                    <div class="white--box col-lg-12 col-md-12 col-sm-12 col-12 flex-fill mb-3">
                                        <div class="d-flex justify-content-center flex-column align-items-center h-100 text-white">
                                            <h3>Commands count</h3>
                                            {{-- <div class="odometer" id="odometer">0</div> --}}
                                            <h2>34971</h2>
                                        </div>
                                    </div>
                                    <div class="white--box col-lg-12 col-md-12 col-sm-12 col-12 flex-fill ">
                                        <div class="d-flex justify-content-center flex-column align-items-center h-100 text-white">
                                            <h3>Member count</h3>
                                            {{-- <div class="odometer" id="odometer">0</div> --}}
                                            <h2>35256</h2>
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

    <div class="mt-5 mb-5">‎ </div>
    <div class="mt-5 mb-5">‎ </div>
    <div class="card--holder d-flex justify-content-center align-items-center mt-5 mb-5" style="height: 280px;">
        <div class="wrapper">
            <div class="xy">
                <input type="radio" name="slide" id="c1" checked>
                <label for="c1" class="warp-card">
                    <div class="warp-row">
                        <div class="icon">1</div>
                        <div class="description">
                            <h4>Winter</h4>
                            <p>Winter has so much to offer -
                                creative activities</p>
                        </div>
                    </div>
                </label>
                <input type="radio" name="slide" id="c2">
                <label for="c2" class="warp-card">
                    <div class="warp-row">
                        <div class="icon">2</div>
                        <div class="description">
                            <h4>Digital Technology</h4>
                            <p>Gets better every day -
                                stay tuned</p>
                        </div>
                    </div>
                </label>
                <input type="radio" name="slide" id="c3">
                <label for="c3" class="warp-card">
                    <div class="warp-row">
                        <div class="icon">3</div>
                        <div class="description">
                            <h4>Globalization</h4>
                            <p>Help people all over the world</p>
                        </div>
                    </div>
                </label>
                <input type="radio" name="slide" id="c4">
                <label for="c4" class="warp-card">
                    <div class="warp-row">
                        <div class="icon">4</div>
                        <div class="description">
                            <h4>New technologies</h4>
                            <p>Space engineering becomes
                                more and more advanced</p>
                        </div>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <div class="mt-5 mb-5">‎ </div>

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
