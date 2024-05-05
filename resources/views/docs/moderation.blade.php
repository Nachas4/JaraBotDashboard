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
            <h3>See Moderation Message Channels</h3>

            <div class="card-- mt-3" style="height: fit-content">
                <div>
                    <div>
                        <h4><b>modchannels</b></h4>

                        <p>Usage: <span class="usage-example">&modchannels</span></p>
                    </div>

                    <div>
                        <p>Where do I see the ban message of an annoying griefer? Oh, here!</p>
                        <div>These can only be changed by the server owner in the <a
                                href="{{-- {{ route('dashboard') }} --}}">dashboard</a></div>
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
                                href="{{-- {{ route('dashboard') }} --}}">dashboard</a>.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="docs-card col-12 mt-4">
            <h3>Blacklisted Words</h3>

            <div class="card-- mt-3" style="height: fit-content">
                <div>
                    <div>
                        <p>Messages containing blacklisted words will be automatically deleted and logged to the Blacklist Mod Message Channel.</p>
                        <div>These can only be changed by the server owner in the <a
                                href="{{-- {{ route('dashboard') }} --}}">dashboard</a>.</div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-4">

        <div class="card-- card-info d-flex flex-row fs-5 col-12 mt-4" style="height: fit-content">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-warning fa-xl mb-1 ms-1 me-3"></i>
            </div>
            <div>The following commands will send messages to the <a href="">Moderation Message Channels</a>.</div>
        </div>

        <div class="card-- card-info d-flex flex-row fs-5 col-12 mt-1" style="height: fit-content">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-circle-exclamation fa-xl mb-1 ms-1 me-3"></i>
            </div>
            <div>
                Explanation for syntax:
                <span class="usage-example">{user}</span> means the user parameter is required.
                <span class="usage-example">[reason]</span> means the reason parameter is optional.
            </div>
        </div>

        <div class="docs-card col-12 col-md-6 mt-4">
            <h3>Kick a User <i class="fa-solid fa-user-check" data-title="Only for Moderators"></i>
            </h3>

            <div class="card-- mt-3" style="height: fit-content">
                <div>
                    <div>
                        <h4><b>kick</b></h4>

                        <p>Usage: <span class="usage-example">&kick {user} [reason]</span></p>
                    </div>

                    <div>
                        <p>Kicks a user from the server.</p>
                        <div>Moderators can only be changed by the server owner in the <a
                                href="{{-- {{ route('dashboard') }} --}}">dashboard</a>.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="docs-card col-12 col-md-6 mt-4">
            <h3>Ban a User <i class="fa-solid fa-user-check" data-title="Only for Moderators"></i>
            </h3>

            <div class="card-- mt-3" style="height: fit-content">
                <div>
                    <div>
                        <h4><b>ban</b></h4>

                        <p>Usage: <span class="usage-example">&ban {user} [reason]</span></p>
                    </div>

                    <div>
                        <p>Bans a user from the server.</p>
                        <div>Moderators can only be changed by the server owner in the <a
                                href="{{-- {{ route('dashboard') }} --}}">dashboard</a>.</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="docs-card col-12mt-4">
            <h3>Timeout a User <i class="fa-solid fa-user-check" data-title="Only for Moderators"></i>
            </h3>

            <div class="card-- mt-3" style="height: fit-content">
                <div>
                    <div>
                        <h4><b>timeout</b> or <b>to</b></h4>

                        <p>Usage: <span class="usage-example">&timeout {user} [reason]</span> or <span
                                class="usage-example">&to
                                {user}</span></p>
                    </div>

                    <div>
                        <p>Mutes a user in the server.</p>
                        <div>Moderators can only be changed by the server owner in the <a
                                href="{{-- {{ route('dashboard') }} --}}">dashboard</a>.</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
