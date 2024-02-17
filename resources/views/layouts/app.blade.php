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

<body>
    {{-- <svg  style="position:absolute;left: -120px;" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 800 400"><path d="M177.24012756347656,137.4552001953125C149.0143218835195,128.04659779866537,32.0788410504659,88.76941680908203,7.885293483734131,81.00358581542969C-16.30825408299764,73.23775482177734,18.78732450803121,87.27598444620769,32.07884216308594,90.86021423339844C45.37035981814066,94.44444402058919,75.2389399210612,98.77539189656575,87.6343994140625,102.50896453857422C100.0298589070638,106.24253718058269,97.34168243408203,110.27479298909505,106.45159912109375,113.26165008544922C115.56151580810547,116.24850718180339,126.91158040364583,115.05376307169597,142.2938995361328,120.43010711669922C157.67621866861978,125.80645116170247,174.40262095133463,136.85782750447592,198.74551391601562,145.51971435546875C223.08840688069662,154.18160120646158,265.5017954508464,164.9342829386393,288.35125732421875,172.40142822265625C311.2007191975911,179.8685735066732,323.7455139160156,179.5698979695638,335.84228515625,190.3225860595703C347.9390563964844,201.0752741495768,354.3607991536458,224.97012583414713,360.931884765625,236.9175567626953C367.5029703776042,248.8649876912435,362.2759653727214,248.4169692993164,375.268798828125,262.0071716308594C388.2616322835286,275.59737396240234,418.72759501139325,307.258056640625,438.8888854980469,318.4587707519531C459.0501759847005,329.65948486328125,472.64036560058594,328.9127705891927,496.2365417480469,329.2114562988281C519.8327178955078,329.51014200846356,555.6750233968099,324.28314208984375,580.4659423828125,320.2508850097656C605.2568613688151,316.2186279296875,617.054931640625,308.00477091471356,644.9820556640625,305.0179138183594C672.9091796875,302.0310567220052,722.640391031901,301.7323710123698,748.0286865234375,302.3297424316406C773.416982014974,302.92711385091144,805.675038655599,309.0501708984375,797.3118286132812,308.6021423339844C788.9486185709635,308.15411376953125,714.4264933268229,301.13499959309894,697.8494262695312,299.6415710449219" fill="none" stroke-width="8" stroke="url(&quot;#SvgjsLinearGradient1002&quot;)" stroke-linecap="round"></path><defs><linearGradient id="SvgjsLinearGradient1002" gradientTransform="rotate(107, 0.5, 0.5)"><stop stop-color="hsl(212, 72%, 59%)" offset="0"></stop><stop stop-color="hsl(105, 86%, 40%)" offset="1"></stop></linearGradient></defs></svg> --}}
    {{-- <svg style="position:absolute;left: -120px;" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 800 400"><path d="M33.87095642089844,350.71685791015625C35.34497069676717,348.33035669962567,49.24879339853923,323.900826772054,52.68815994262695,320.2508850097656C56.12752648671468,316.60094324747723,73.56629396438599,306.71892893473307,77.77776336669922,304.1218566894531C81.98923276901245,301.5247844441732,102.09974653879802,289.06212320963544,106.45159912109375,287.0967712402344C110.80345170338948,285.1314192708333,127.50746228535971,279.66397735595706,133.3333282470703,279.0322570800781C139.15919420878092,278.4005368041992,173.38409385681152,278.61111022949217,180.82435607910156,279.0322570800781C188.2646183013916,279.4534039306641,221.57704836527506,283.1451593017578,228.31539916992188,284.4085998535156C235.0537499745687,285.67204040527344,260.24788599650066,293.1257422892253,266.8458557128906,295.1612854003906C273.4438254292806,297.19682851155596,306.1574035135905,308.35871348063154,312.5447998046875,310.3942565917969C318.9321960957845,312.4297997029622,342.2804556274414,319.60273701985676,348.3870849609375,321.1469421386719C354.4937142944336,322.691147257487,383.55284459431965,329.4056020100912,390.50177001953125,330.1075134277344C397.45069544474285,330.8094248453776,430.84975723266604,330.94980712890623,437.0967712402344,330.1075134277344C443.3437852478027,329.2652197265625,463.86348871866863,321.671135559082,470.2508850097656,319.3548278808594C476.6382813008626,317.03852020263673,512.2506041971842,303.8366118367513,518.6380004882812,300.5376281738281C525.0253967793783,297.238644510905,546.1768229166667,281.662184753418,551.7921142578125,277.2401428222656C557.4074055989583,272.81810089111326,584.4967060343424,248.57826332092284,590.3225708007812,244.08602905273438C596.1484355672201,239.5937947845459,620.3389911905924,224.66547014872233,626.1648559570312,219.89247131347656C631.9907207234701,215.1194724782308,659.0800211588542,188.13770128885906,664.6953125,183.1541290283203C670.3106038411458,178.17055676778156,692.7254681396485,161.18578161875408,697.8494262695312,156.27239990234375C702.973384399414,151.35901818593342,726.1768352254231,125.13291481018067,730.1075439453125,120.43010711669922C734.0382526652019,115.72729942321777,745.0806585693359,100.16726154327392,748.0286865234375,96.23655700683594C750.9767144775391,92.30585247039795,764.6535331217448,72.7075908279419,767.741943359375,70.25090026855469C770.8303535970052,67.79420970916748,785.0687013753255,65.50627044041951,787.4552001953125,64.87454986572266C789.8416990152995,64.2428292910258,797.3655920410156,62.39695542017619,798.2078857421875,62.18638229370117" fill="none" stroke-width="8" stroke="url(&quot;#SvgjsLinearGradient1001&quot;)" stroke-linecap="round" stroke-dasharray="0 0"></path><defs><linearGradient id="SvgjsLinearGradient1001"><stop stop-color="hsl(37, 99%, 67%)" offset="0"></stop><stop stop-color="hsl(316, 73%, 52%)" offset="1"></stop></linearGradient></defs></svg> --}}
    <div class="d-flex w-100 flex-column justify-content-between" style="min-height: 100vh;">

        <div class="mb-5" id="app">
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


            <main class="py-4 pt-0">
                @yield('content')
            </main>
        </div>
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
