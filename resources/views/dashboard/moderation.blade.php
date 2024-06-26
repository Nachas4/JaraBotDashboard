@extends('layouts.dashboard')

@section('content')
    @php
        use App\Models\DcGuild;
        use GuzzleHttp\Client;

        $guild = DcGuild::where('guild_id', $server)->first();

        $modMsgChs = $guild->modmessagechannels()->get()->first();
        $blacklist = $guild->blacklist()->get();
        
        $moderators = $guild->moderators()->get();
        $memberIds = [];

        foreach ($moderators as $mod) {
            $memberIds[] = $mod->user_id;
        }

        $members = [];

        // Moderators
        $membersUrl = "https://discord.com/api/v10/guilds/{$guild->guild_id}/members?limit=1000";
        $client = new Client();

        $response = $client->request('GET', $membersUrl, [
            'headers' => [
                'Authorization' => 'Bot ' . config('discord.discord_bot_token'),
            ],
        ]);

        $allMembers = json_decode($response->getBody(), true);

        foreach ($allMembers as $member) {
            $user = $member['user'];

            if (empty($user['bot'])) {
                $members[] = [
                    'id' => $user['id'],
                    'name' => $user['global_name'] ?? $user['username'],
                    'selected' => in_array($user['id'], $memberIds)
                ];
            }
        }

        $_GLOBALS['members'] = $members;
    @endphp

    <div class="d-flex justify-content-center card--header text-white p-2 mx-4 mb-3">
        <div class="text-center fs-3"><b>{{ $guild->name }}</b></div>
    </div>

    <div class="card--body p-sm-3 h-100 text-white rounded overflow-auto" style="overflow-x: hidden !important;">
        <div class="me-3">
            <h2 class="text--cyan mb-3"><b>Moderation Settings</b></h2>

            {{-- Mod Message Channels --}}
            <form id="modMsgChsForm">
                @csrf
                <input type="hidden" name="dc_guild_id" id="dc_guild_id" value="{{ $guild->id }}">

                <div class="row px-4 pt-3 mb-4 me-3 bg--black rounded">
                    <div class="d-flex">
                        <h3>Mod Message Channels</h3>

                        <div class="d-flex align-items-center mb-2 ps-2">
                            <i class="fa-solid fa-check fs-5" id="modMsgChs-feedback" style="color: green"
                                data-title="Save Feedback"></i>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-4 mb-3">
                        <label for="kick" class="form-label">Kick Message Channel</label>
                        <select name="kick" id="kick" class="bgs-input form-select">
                            <option disabled>Select channel</option>
                            <option value="0">None</option>
                            <option value="619514971868626978">General</option>
                            <option value="981514971867836971">Talk About</option>
                            <option value="762514972868926974">Etc.</option>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-4 mb-3">
                        <label for="ban" class="form-label">Ban Message Channel</label>
                        <select name="ban" id="ban" class="bgs-input form-select">
                            <option disabled>Select channel</option>
                            <option value="0">None</option>
                            <option value="619514971868626978">General</option>
                            <option value="981514971867836971">Talk About</option>
                            <option value="762514972868926974">Etc.</option>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-4 mb-3">
                        <label for="timeout" class="form-label">Timeout Message Channel</label>
                        <select name="timeout" id="timeout" class="bgs-input form-select">
                            <option disabled>Select channel</option>
                            <option value="0">None</option>
                            <option value="619514971868626978">General</option>
                            <option value="981514971867836971">Talk About</option>
                            <option value="762514972868926974">Etc.</option>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-4 mb-3">
                        <label for="blacklist" class="form-label">Blacklist Message Channel</label>
                        <select name="blacklist" id="blacklist" class="bgs-input form-select">
                            <option disabled>Select channel</option>
                            <option value="0">None</option>
                            <option value="619514971868626978">General</option>
                            <option value="981514971867836971">Talk About</option>
                            <option value="762514972868926974">Etc.</option>
                        </select>
                    </div>

                    <div class="mb-3" id="modMsgChsForm-errors"></div>

                </div>
            </form>

            {{-- Moderators --}}
            <form id="moderatorsForm">
                @csrf
                <input type="hidden" name="dc_guild_id" id="dc_guild_id" value="{{ $guild->id }}">

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="px-4 mb-4 me-3 no--search">
                            <h3>Moderators</h3>
                            <div class="d-flex flex-row flex-fill align-items-center">
                                <select name="moderators[]" id="moderators" multiple>
                                    @php
                                        foreach ($_GLOBALS['members'] as $member) {
                                            if ($member['selected']) {
                                                echo '<option selected value=' .
                                                    $member['id'] .
                                                    '>' .
                                                    $member['name'] .
                                                    '</option>';
                                            } else {
                                                echo '<option value=' . $member['id'] . '>' . $member['name'] . '</option>';
                                            }
                                        }
                                    @endphp
                                </select>

                                <div class="d-flex align-items-center ps-2">
                                    <i class="fa-solid fa-check fs-5" id="moderators-feedback" style="color: green"
                                        data-title="Save Feedback"></i>
                                </div>
                            </div>

                            <label for="moderators" class="text--grey ">These people have the power to perform kicks, bans
                                and timeouts.</label>

                            <div id="moderatorsForm-errors"></div>
                        </div>
                    </div>
                </div>
            </form>

            {{-- Blacklist --}}
            <form id="blacklistForm">
                @csrf
                <input type="hidden" name="dc_guild_id" id="dc_guild_id" value="{{ $guild->id }}">

                <div class="row px-4 pt-3 mb-4 me-3 bg--black rounded">
                    <h3>Word Blacklist</h3>

                    <div class="mb-4">
                        {{-- Placeholder must be like this because reasons --}}
                        <div class="d-flex">
                            <textarea name="blacklist" id="blacklist-ta" class="bgs-input form-control flex-fill" rows="3">
@php
    if ($blacklist !== null) {
        $count = count($blacklist);
        foreach ($blacklist as $item) {
            $count--;

            echo trim($item->word);
            if ($count !== 0) {
                echo ', ';
            }
        }
    }
@endphp
                            </textarea>
                            <div class="d-flex align-items-end ps-2">
                                <i class="fa-solid fa-check fs-5" id="blacklist-ta-feedback" style="color: green"
                                    data-title="Save Feedback"></i>
                            </div>
                        </div>

                        <label for="blacklist"><b>Be sure to seperate each word with ", "!</b>
                            <br>
                            Messages containing blacklisted words will be automatically deleted and
                            logged to the Blacklist Mod Message Channel.</label>

                        <div id="blacklistForm-errors"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        //Autosave in the background with Ajax (bgs => background-save)
        const forceDelete = {{ config('app.forcedelete') }};
        $(document).ready(function() {
            const inputs = document.querySelectorAll('.bgs-input');
            inputs.forEach(element => {
                let elementFeedback = document.getElementById(`${element.id}-feedback`);

                if (element.id == 'kick' || element.id == 'ban' || element.id == 'timeout' || element.id ==
                    'blacklist') {
                    elementFeedback = document.getElementById('modMsgChs-feedback');
                }

                let elementId = element.id.replace('kick', 'modMsgChs')
                    .replace('ban', 'modMsgChs')
                    .replace('timeout', 'modMsgChs')
                    .replace('blacklist', 'modMsgChs');

                const errorContainer = document.getElementById(`${element.form.id}-errors`);

                $(element).on("input", function(event) {
                    elementFeedback.classList.remove('fa-check', 'fa-xmark');
                    elementFeedback.classList.add('fa-spinner');
                    elementFeedback.style.color = 'cornflowerblue';
                });

                $(element).on('focusout', function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    console.log($(`#${element.form.id}`));
                    console.log($(`#${element.form.id}`).serialize());

                    let route = '';

                    switch (element.form.id) {
                        case 'modMsgChsForm':
                            route = '{{ route('modMsgChs.save') }}'
                            break;
                        case 'blacklistForm':
                            route = '{{ route('blacklist.save') }}'
                            break;
                        default:
                            break;
                    }

                    $.ajax({
                        url: route,
                        type: 'POST',
                        data: $(`#${element.form.id}`).serialize() +
                            `&forceDelete=${forceDelete}`,
                        success: function(response) {
                            elementFeedback.classList.remove('fa-xmark', 'fa-spinner');
                            elementFeedback.classList.add('fa-check');
                            elementFeedback.style.color = 'green';

                            errorContainer.innerHTML = '';

                            console.log(response);
                        },
                        //validation errors
                        error: function(response) {
                            // console.log(response['responseJSON']);
                            elementFeedback.classList.remove('fa-check', 'fa-spinner');
                            elementFeedback.classList.add('fa-xmark');
                            elementFeedback.style.color = 'red';

                            let errors = response['responseJSON']['errors'];
                            console.log(errors);

                            displayErrors(errorContainer, errors);
                        }
                    });
                });
            });

            const moderators_form_id = 'moderatorsForm';
            const moderators_input_id = 'moderators';
            new MultiSelectTag(moderators_input_id, {
                rounded: true,
                onChange: function(values) {
                    console.log(moderators_form_id);
                    const elementFeedback = document.getElementById(`${moderators_input_id}-feedback`);
                    const errorContainer = document.getElementById(`${moderators_form_id}-errors`);

                    elementFeedback.classList.remove('fa-check', 'fa-xmark');
                    elementFeedback.classList.add('fa-spinner');
                    elementFeedback.style.color = 'cornflowerblue';

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    console.log($(`#${moderators_form_id}`));
                    console.log($(`#${moderators_form_id}`).serialize());

                    $.ajax({
                        url: '{{ route('moderators.save') }}',
                        type: 'POST',
                        data: $(`#${moderators_form_id}`).serialize() +
                            `&forceDelete=${forceDelete}`,
                        success: function(response) {
                            elementFeedback.classList.remove('fa-xmark', 'fa-spinner');
                            elementFeedback.classList.add('fa-check');
                            elementFeedback.style.color = 'green';

                            errorContainer.innerHTML = '';

                            console.log(response);
                        },
                        //validation errors
                        error: function(response) {
                            console.log(response);
                            elementFeedback.classList.remove('fa-check', 'fa-spinner');
                            elementFeedback.classList.add('fa-xmark');
                            elementFeedback.style.color = 'red';

                            let errors = response['responseJSON']['errors'];
                            console.log(errors);

                            displayErrors(errorContainer, errors);
                        }
                    });
                }
            });
        });

        let displayErrors = (container, errors) => {
            container.innerHTML = '';

            Object.keys(errors).forEach(errorKey => {
                let errorMessage = errors[errorKey][0];
                let errorElement = document.createElement('div');
                errorElement.className = 'text-danger';
                errorElement.textContent = errorMessage;

                container.appendChild(errorElement);
            });
        }
    </script>
@endsection
