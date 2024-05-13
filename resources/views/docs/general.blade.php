@php
    $server = '69';

if (Auth::check()) {
        $server = Auth::user()->owned_guilds()->first()->guild_id ?? '';
    }
@endphp

<div class="text-white p-2 mb-3">
    <div class="row">
        <div class="col-12 text-center text-light fs-3"><i class="fa-solid fa-house me-2"></i><b>General Commands</b>
        </div>
    </div>
</div>

<div class="card--body p-3 text-white rounded">
    
    <div class="row">
        {{-- Welcome Message --}}
        <div class="docs-card col-12 col-md-6 mt-4">
            <h3>Welcome Message</h3>

            <div class="card-- mt-3" style="height: fit-content">
                <div>
                    <div>
                        <h4><b>welcome-message</b></h4>

                        <p>Usage: <span class="usage-example">&welcome-message</span></p>
                    </div>

                    <div>
                        <p>Sends a template welcome message.</p>
                        <div>This can only be changed by the server owner in the <a
                                href="{{ route('dashboard.general', ['server' => $server]) }}">dashboard</a>.</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Autoresponses --}}
        <div class="docs-card col-12 col-md-6 mt-4">
            <h3>Get a list of Autoresponses</h3>
        
            <div class="card-- mt-3" style="height: fit-content">
                <div>
                    <div>
                        <h4><b>autoresponses</b></h4>
        
                        <p>Usage: <span class="usage-example">&autoresponses</span></p>
                    </div>
        
                    <div>
                        <p>Get a list of all the autoresponses the server has set up.</p>
                        <div>This can only be changed by the server owner in the <a
                                href="{{ route('dashboard.general', ['server' => $server]) }}">dashboard</a>.</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Autoroles --}}
        <div class="docs-card col-12 col-md-6 mt-4">
            <h3>Get a list of Autoroles</h3>

            <div class="card-- mt-3" style="height: fit-content">
                <div>
                    <div>
                        <h4><b>autoroles</b></h4>

                        <p>Usage: <span class="usage-example">&autoroles</span></p>
                    </div>

                    <div>
                        <p>Get a list of all the autoroles the server has set up.</p>
                        <div>This can only be changed by the server owner in the <a
                                href="{{ route('dashboard.general', ['server' => $server]) }}">dashboard</a>.</div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Server Settings --}}
        <div class="docs-card col-12 col-md-6 mt-4">
            <h3>Get a list of Server Settings</h3>

            <div class="card-- mt-3" style="height: fit-content">
                <div>
                    <div>
                        <h4><b>settings</b></h4>

                        <p>Usage: <span class="usage-example">&settings</span></p>
                    </div>

                    <div>
                        <p>See what modules are enabled on this server.</p>
                        <div>These can only be changed by the server owner in the <a
                                href="{{ route('dashboard.general', ['server' => $server]) }}">dashboard</a>.</div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
