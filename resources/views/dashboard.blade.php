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
    <div class="row" style="height: 100vh !important;">
        <div class="col-2 h-100 pb-2">
            <div class="card-- p-4 pt-5 h-100">
                <div class="d-felx flex-column justify-content-between h-100">

                    <a class="text-white nav-logo" href="{{ url('/') }}" style="font-size: 30px;" style="height:10%;">
                        <img src="{{ asset('log6.png') }}" class="img-fluid me-1"
                            style="height:60px; margin-top:-10px; margin-left:-10px;">
                        JaraBots
                    </a>

                    <div class="card--holder w-100 rounded mt-4 mb-2" style="height:10%;">
                    </div>
                    <div class="d-flex flex-column justify-content-around text--black w-100 rounded mt-2 mb-2"
                        style="height:20%;">
                        <div class="fs-5 ms-4">
                            <i class="fa-solid fa-house me-2" style="color:rgb(136, 224, 227);"></i><span
                                style="color:rgb(136, 224, 227);">Dashboard</span>
                        </div>
                        <div class="fs-5 ms-4">
                            <i class="fa-regular fa-compass me-2"></i><span>News Feed</span>
                        </div>
                        <div class="fs-5 ms-4">
                            <i class="fa-regular fa-user me-2"></i><span>Your Profile</span>
                        </div>
                        <div class="fs-5 ms-4">
                            <i class="fa-solid fa-gear me-2"></i><span>Settings</span>
                        </div>
                    </div>
                    <hr>
                    <div style="height:40%;" class="mb-5">
                        <div class="d-flex mt-2 mb-3 w-100 justify-content-between ">
                            <span>Notifications</span>
                            <a class="text-secondary">View All ></a>
                        </div>
                        <div class="d-flex flex-column justify-content-around w-100 rounded mt-2 mb-2">
                            <div
                                class="notification bg--pink rounded-3 flex-fill d-flex flex-column justify-content-between">
                                <span class="text-black fw-bold fs-6">Evetnt started</span>
                                <span class="text-black fw-bold fs-6">XYZ server</span>
                                <span class="text-muted fw-bold fs-6">01.23 16:00</span>
                            </div>
                            <div
                                class="notification bg--neon rounded-3 flex-fill mt-3 mb-3 d-flex flex-column justify-content-between">
                                <span class="text-black fw-bold fs-6">Evetnt started</span>
                                <span class="text-black fw-bold fs-6">XYZ server</span>
                                <span class="text-muted fw-bold fs-6">01.23 16:00</span>
                            </div>
                            <div
                                class="notification bg--yellow rounded-3 flex-fill d-flex flex-column justify-content-between">
                                <span class="text-black fw-bold fs-6">Evetnt started</span>
                                <span class="text-black fw-bold fs-6">XYZ server</span>
                                <span class="text-muted fw-bold fs-6">01.23 16:00</span>
                            </div>
                        </div>
                    </div>

                    <div class="text--neon" style="position:absolute; bottom:20px;">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i><a class="btn btn-link">Log Out</a>
                    </div>

                </div>



            </div>
        </div>





        <div class="col-10 h-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quasi voluptatum
            aliquid ad explicabo aperiam natus, est ex illo odio eius suscipit, delectus a quo eos impedit minus optio
            ratione.
            Necessitatibus doloribus dolor laborum vero maiores earum suscipit, magni, culpa consequatur rem corporis,
            ab nam tempore animi dolorum eum temporibus eveniet architecto provident accusantium. Esse tenetur tempore
            ut velit nostrum.
            Adipisci pariatur error minus quibusdam possimus sit quisquam laborum maiores officiis magni inventore,
            distinctio modi aspernatur totam explicabo! Dolores ipsam magni aspernatur exercitationem harum velit
            explicabo aut nostrum alias veniam!
            Cum ipsa facilis ut quod quos architecto mollitia, culpa, esse doloremque omnis libero harum tempore iusto
            doloribus accusantium neque exercitationem reiciendis dicta voluptates maxime aspernatur officiis. Dicta
            libero fugit minima?
            Hic quaerat dolore dolorum repudiandae ex rerum inventore minima corrupti ipsum? Tempora illo, reprehenderit
            accusamus non porro labore libero! Reprehenderit odit omnis necessitatibus ipsam id quis repellendus
            accusantium aliquam sit.
            Praesentium temporibus facilis nisi corporis perspiciatis error tempore optio iure repudiandae nostrum at
            blanditiis, autem unde, voluptatum laborum enim delectus id. Sunt recusandae architecto, asperiores tempora
            maxime dolores sed corrupti!
            Laborum aliquam earum explicabo cupiditate iusto aut dolorem delectus eos vero ab nam alias tempore totam
            omnis quos, obcaecati vitae, corporis dignissimos ullam reprehenderit blanditiis! Cupiditate minima ratione
            fuga sed.
            Fuga optio animi, totam similique, suscipit molestias eveniet dolorem minima possimus hic harum explicabo
            eligendi consequatur nobis. Incidunt vel nostrum pariatur reprehenderit, nihil cumque, doloribus, officiis
            expedita fugiat tenetur assumenda.
            Odio, veniam est! Magnam pariatur molestias tenetur quam quaerat! Quasi labore quibusdam hic iste sapiente
            repellendus animi reprehenderit a possimus perspiciatis nulla consequuntur odio, deserunt veritatis ipsum
            libero molestias. Veritatis.
            Accusantium error sint ex soluta? Eius voluptatum cum at quibusdam cupiditate itaque autem vitae, delectus,
            hic dolorem consequuntur adipisci quia sapiente laudantium officia? Et tenetur enim officiis. Dicta, eveniet
            doloribus?</div>
    </div>


</body>

</html>
