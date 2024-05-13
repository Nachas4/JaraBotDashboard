@php
    $server = '69';

if (Auth::check()) {
        $server = Auth::user()->owned_guilds()->first()->guild_id ?? '';
    }
@endphp

<div class="text-white p-2 mb-3">
    <div class="row">
        <div class="col-12 text-center text-light fs-3"><i class="fa-solid fa-gamepad me-2"></i><b>Minigame
                Commands</b>
        </div>
    </div>
</div>

<div class="card--body p-3 text-white rounded">

    <div class="row">

        <div class="card-- card-info d-flex flex-row fs-5 col-12 mt-4" style="height: fit-content">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-triangle-exclamation fa-xl mb-1 ms-1 me-3"></i>
            </div>
            <div>Rock Paper Scissors in only work in progress, sadly not yet available in the finished version.</div>
        </div>

        <div class="docs-card col-12 col-md-6 mt-4">
            <h3>Rock Paper Scissors</h3>

            <div class="card-- mt-3" style="height: fit-content">
                <div>
                    <div>
                        <h4><b>rps</b></h4>

                        <p>Usage: <span class="usage-example">&rps {user}</span></p>
                    </div>

                    <div>
                        <p>Try and beat your friends or foes with this built in rock-paper-scissors minigame!</p>
                        <div>RPS statistics can only be viewed by the server owner in the <a
                                href="{{ route('dashboard.minigame', ['server' => $server]) }}">dashboard</a>.</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
