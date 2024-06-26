@extends('layouts.dashboard')

@section('content')
    @php
        use App\Models\DcGuild;

        $guild = DcGuild::where('guild_id', $server)->first();
    @endphp

    <div class="d-flex justify-content-center card--header text-white p-2 mx-4 mb-3">
        <div class="text-center fs-3"><b>{{ $guild->name }}</b></div>
    </div>

    <div class="card--body p-sm-3 h-100 text-white rounded overflow-auto" style="overflow-x: hidden !important;">
        <div class="me-3">
            <hr class="me-2">

            <h2 class="text--cyan mb-3"><b>Minigame Settings </b></h2>
        </div>
    </div>
@endsection
