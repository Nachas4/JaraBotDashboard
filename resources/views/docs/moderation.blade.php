@extends('layouts.docs-dashboard')

@section('content')
    <div class="text-white p-2 mb-3">
        <div class="row">
            <div class="col-12 text-center text-light fs-3"><i class="fa-solid fa-user-check me-2"></i><b>Moderation
                    Commands</b>
            </div>
        </div>
    </div>

    <div class="card--body p-3 text-white rounded">

        <div class="row">

            <div class="docs-card col-12 col-md-6 mt-4">
                <h3>Get the Moderation Message Channels</h3>

                <div class="card-- mt-3" style="height: fit-content">
                    <div>
                        <div>
                            <h4><b>modchannels</b></h4>

                            <p>Usage: <span class="usage-example">&modchannels</span></p>
                        </div>

                        <div>
                            <p>Where do I see the ban message of an annoying griefer? Oh, here!</p>
                            <div>These can only be changed by the server owner in the <a
                                    href="{{ route('dashboard') }}">dashboard</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="docs-card col-12 col-md-6 mt-4">
                <h3>Get the Moderation Roles</h3>

                <div class="card-- mt-3" style="height: fit-content">
                    <div>
                        <div>
                            <h4><b>modroles</b></h4>

                            <p>Usage: <span class="usage-example">&modroles</span></p>
                        </div>

                        <div>
                            <p>Get a list of the roles used for moderation within the server.</p>
                            <div>These can only be changed by the server owner in the <a
                                    href="{{ route('dashboard') }}">dashboard</a>.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="docs-card col-12 col-md-6 mt-4">
                <h3>Get a list of Moderators</h3>

                <div class="card-- mt-3" style="height: fit-content">
                    <div>
                        <div>
                            <h4><b>moderators</b></h4>

                            <p>Usage: <span class="usage-example">&moderators</span></p>
                        </div>

                        <div>
                            <p>A list of people who shouldn't see you breaking the server rules.</p>
                            <div>They can only be changed by the server owner in the <a
                                    href="{{ route('dashboard') }}">dashboard</a>.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="docs-card col-12 col-md-6 mt-4">
                <h3>Get the Server Settings</h3>

                <div class="card-- mt-3" style="height: fit-content">
                    <div>
                        <div>
                            <h4><b>settings</b></h4>

                            <p>Usage: <span class="usage-example">&settings</span></p>
                        </div>

                        <div>
                            <p>A list of all modules and whether they're activated on the server.</p>
                            <div>These can only be changed by the server owner in the <a
                                    href="{{ route('dashboard') }}">dashboard</a>.</div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-4">

            <div class="card-- card-info col-12 mt-4" style="height: fit-content">
                <div class="fs-5"><i class="fa-solid fa-circle-exclamation fa-xl ms-1 me-2"></i>The following methods will send messages to the <a href="">Moderation Message Channels</a>.</div>
            </div>

            <div class="docs-card col-12 col-md-6 mt-4">
                <h3>Kick a User <i class="fa-solid fa-user-check" data-toggle="tooltip" title="Only for Moderators"></i>
                </h3>

                <div class="card-- mt-3" style="height: fit-content">
                    <div>
                        <div>
                            <h4><b>kick</b></h4>

                            <p>Usage: <span class="usage-example">&kick {user}</span></p>
                        </div>

                        <div>
                            <p>Kicks a user from the server.</p>
                            <div>Moderators can only be changed by the server owner in the <a
                                    href="{{ route('dashboard') }}">dashboard</a>.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="docs-card col-12 col-md-6 mt-4">
                <h3>Ban a User <i class="fa-solid fa-user-check" data-toggle="tooltip" title="Only for Moderators"></i></h3>

                <div class="card-- mt-3" style="height: fit-content">
                    <div>
                        <div>
                            <h4><b>ban</b></h4>

                            <p>Usage: <span class="usage-example">&ban {user}</span></p>
                        </div>

                        <div>
                            <p>Bans a user from the server.</p>
                            <div>Moderators can only be changed by the server owner in the <a
                                    href="{{ route('dashboard') }}">dashboard</a>.</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="docs-card col-12 col-md-6 mt-4">
                <h3>Timeout a User <i class="fa-solid fa-user-check" data-toggle="tooltip" title="Only for Moderators"></i>
                </h3>

                <div class="card-- mt-3" style="height: fit-content">
                    <div>
                        <div>
                            <h4><b>timeout</b> or <b>to</b></h4>

                            <p>Usage: <span class="usage-example">&timeout {user}</span> or <span class="usage-example">&to
                                    {user}</span></p>
                        </div>

                        <div>
                            <p>Mutes a user in the server.</p>
                            <div>Moderators can only be changed by the server owner in the <a
                                    href="{{ route('dashboard') }}">dashboard</a>.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="docs-card col-12 col-md-6 mt-4">
                <h3>Quarantine a User <i class="fa-solid fa-user-check" data-toggle="tooltip"
                        title="Only for Moderators"></i></h3>

                <div class="card-- mt-3" style="height: fit-content">
                    <div>
                        <div>
                            <h4><b>quarantine</b></h4>

                            <p>Usage: <span class="usage-example">&quarantine {user}</span></p>
                        </div>

                        <div>
                            <p>Quarantined users only have access to a sealed channel in the server.</p>
                            <div>Moderators can only be changed by the server owner in the <a
                                    href="{{ route('dashboard') }}">dashboard</a>.</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
