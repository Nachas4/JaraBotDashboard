@extends('layouts.dashboard')

@section('content')
    <div class="card--header text-white p-2 me-4">
        <div class="row">
            <div class="col-12 text-center fs-3"><b>XYZ server settings</b></div>
        </div>
    </div>

    <div class="card--body p-sm-3 h-100 text-white rounded overflow-auto" style="overflow-x: hidden !important;">

        <hr class="me-2">

        <h2 class="text--cyan mb-3"><b>General Settings</b></h2>

        {{-- Welcome Message --}}
        <form id="wMsgForm">
            @csrf
            <input type="hidden" name="dc_guild_id" id="dc_guild_id" value="1">

            <div class="row px-4 pt-3 mb-4 me-3 bg--black rounded">
                <h3>Welcome message</h3>

                <div class="col-12 col-lg-12 col-xl-4">
                    <div class="d-flex w-100 h-100">
                        <textarea name="message" id="message" class="bgs-input form-control flex-fill" rows="3"
                            placeholder="We welcome ${user} to the server!"></textarea>
                        <div class="d-flex align-items-end ps-2">
                            <i class="fa-solid fa-check fs-5" id="message-feedback" style="color: green"
                                data-title="Save Feedback"></i>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="row">

                        <div class="col-12 mb-3 mt-3 mt-xl-0">
                            <h5>Channel</h5>

                            <div class="d-flex">
                                <select name="channel_id" id="channel_id" class="bgs-input form-select">
                                    <option disabled>Select channel</option>
                                    <option value="711348770104672308">Welcome</option>
                                    <option value="619514971868626978">General</option>
                                    <option value="981514971867836971">Talk About</option>
                                    <option value="762514972868926974">Etc.</option>
                                </select>
                                <div class="d-flex align-items-center ps-2">
                                    <i class="fa-solid fa-check fs-5" id="channel_id-feedback" style="color: green"
                                        data-title="Save Feedback"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <h5>Background Image</h5>

                            <input name="bg_image" type="file" id="bg_image" class="d-none bgs-input-file"
                                {{-- onchange="saveImg()" --}} />
                            <div class="d-flex flex-row">
                                <label for="bg_image" class="btn btn-primary button">Select file</label>

                                <div class="d-flex align-items-center ps-2">
                                    <i class="fa-solid fa-check fs-5" id="bg_image-feedback" style="color: green"
                                        data-title="Save Feedback"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4 pt-3 d-flex justify-content-md-end justify-content-center">
                    <img src="{{ asset('th3.png') }}" class="img-thumbnail" style="height: 150px;">
                </div>

                <div class="mb-4 pt-2" id="wMsgForm-errors"></div>

            </div>
        </form>

        {{-- Autoroles --}}
        <form id="autoRolesForm">
            @csrf
            <input type="hidden" name="dc_guild_id" id="dc_guild_id" value="1">

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="ps-4 pe-4 mb-4 me-3 no--search">
                        <h3>Autoroles</h3>
                        <div class="d-flex flex-row flex-fill align-items-center">
                            <select name="autoRoles[]" id="autoRoles" multiple>
                                <option value="981514971867836975">Admin</option>
                                <option value="981514971867836974">Staff</option>
                                <option value="981514971867836973">Moderator</option>
                                <option value="981514971867836972">Member</option>
                                <option value="981514971867836971">Supporter</option>
                            </select>

                            <div class="d-flex align-items-center ps-2">
                                <i class="fa-solid fa-check fs-5" id="autoRoles-feedback" style="color: green"
                                    data-title="Save Feedback"></i>
                            </div>
                        </div>

                        <label for="autoRoles" class="text--grey ">Roles that every new user automatically gets.</label>

                        <div id="autoRolesForm-errors"></div>
                    </div>
                </div>
        </form>

        {{-- Auto Responses --}}
        <form id="autoRespsForm">
            @csrf
            <input type="hidden" name="dc_guild_id" id="dc_guild_id" value="1">

            <div class="row ps-4 pe-4 pt-3 mb-4 me-3 bg--black rounded">
                <h3>Auto Responses</h3>

                <div class="mb-4">
                    <div class="d-flex">
                        {{-- Placeholder must be like this because reasons --}}
                        <textarea name="autoResponses" id="autoResponses" class="bgs-input form-control flex-fill" rows="3"
                            placeholder="help->Hey there! Please visit this channel if you want to know more about the server: #server-rules
hello there->General Kenobi!"></textarea>

                        <div class="d-flex align-items-center ps-2">
                            <i class="fa-solid fa-check fs-5" id="autoResponses-feedback" style="color: green"
                                data-title="Save Feedback"></i>
                        </div>
                    </div>

                    <div class="mt-2" id="autoRespsForm-errors"></div>
                </div>
            </div>
        </form>

        {{-- Server Settings --}}
        {{-- TODO: replace  @checked(false) and all other values on this page with read values from database --}}
        <form id="serverSettsForm">
            @csrf
            <input type="hidden" name="dc_guild_id" id="dc_guild_id" value="1">

            <div class="row">
                <div class="col">
                    <div class="ps-4 pe-4 mb-4 me-3">
                        <div class="d-flex flex-row align-items-center mb-3">
                            <h3 class="m-0">Server Modules</h3>

                            <button type="button" name="saveButton" id="serverSettsSaveButton"
                                class="btn btn-outline-success bgs-input-btn ms-3">
                                Save
                            </button>

                            <div class="d-flex align-items-center ps-2">
                                <i class="fa-solid fa-check fs-5" id="serverSettsSaveButton-feedback"
                                    style="color: green" data-title="Save Feedback"></i>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-start gap-5 fs-5 mb-3">

                            <div class="setting-checkbox px-2 rounded user-select-none d-flex flex-row align-items-center"
                                onclick="toggleSetting('welcome_messages_enabled');">
                                <input type="checkbox" name="welcome_messages_enabled" class="custom-checkbox"
                                    id="welcome_messages_enabled" @checked(false)>
                                <div class="indicator me-2"></div>

                                <label for="welcome_messages_enabled">Welcome Messages</label>
                            </div>

                            <div class="setting-checkbox px-2 rounded user-select-none d-flex flex-row align-items-center"
                                onclick="toggleSetting('auto_responses_enabled');">
                                <input type="checkbox" name="auto_responses_enabled" class="custom-checkbox"
                                    id="auto_responses_enabled" @checked(false)>
                                <div class="indicator me-2"></div>

                                <label for="auto_responses_enabled">Auto Responses</label>
                            </div>

                            <div class="setting-checkbox px-2 rounded user-select-none d-flex flex-row align-items-center"
                                onclick="toggleSetting('auto_roles_enabled');">
                                <input type="checkbox" name="auto_roles_enabled" class="custom-checkbox"
                                    id="auto_roles_enabled" @checked(false)>
                                <div class="indicator me-2"></div>

                                <label for="auto_roles_enabled">Auto Roles</label>
                            </div>

                        </div>

                        <div class="d-flex flex-row justify-content-start gap-5 fs-5 mb-3">

                            <div class="setting-checkbox px-2 rounded user-select-none d-flex flex-row align-items-center"
                                onclick="toggleSetting('mod_message_channels_enabled');">
                                <input type="checkbox" name="mod_message_channels_enabled" class="custom-checkbox"
                                    id="mod_message_channels_enabled" @checked(false)>
                                <div class="indicator me-2"></div>

                                <label for="mod_message_channels_enabled">Mod Message Channels</label>
                            </div>

                            <div class="setting-checkbox px-2 rounded user-select-none d-flex flex-row align-items-center"
                                onclick="toggleSetting('pickups_enabled');">
                                <input type="checkbox" name="pickups_enabled" class="custom-checkbox"
                                    id="pickups_enabled" @checked(true)>
                                <div class="indicator me-2"></div>

                                <label for="pickups_enabled">Pickups</label>
                            </div>

                            <div class="setting-checkbox px-2 rounded user-select-none d-flex flex-row align-items-center"
                                onclick="toggleSetting('quotes_enabled');">
                                <input type="checkbox" name="quotes_enabled" class="custom-checkbox" id="quotes_enabled"
                                    @checked(true)>
                                <div class="indicator me-2"></div>

                                <label for="quotes_enabled">Quotes</label>
                            </div>

                        </div>

                        <div class="d-flex flex-row justify-content-start gap-5 fs-5 mb-3">

                            <div class="setting-checkbox px-2 rounded user-select-none d-flex flex-row align-items-center"
                                onclick="toggleSetting('blacklist_enabled');">
                                <input type="checkbox" name="blacklist_enabled" class="custom-checkbox"
                                    id="blacklist_enabled" @checked(true)>
                                <div class="indicator me-2"></div>

                                <label for="blacklist_enabled">Blacklist</label>
                            </div>

                        </div>

                        <div id="serverSettsForm-errors"></div>

                    </div>
                </div>
            </div>
        </form>

        <hr>
    </div>


    <script>
        let toggleSetting = (id) => {
            let checkbox = document.getElementById(id);
            checkbox.checked = !checkbox.checked;
        }

        // let saveImg = () => {
        //     console.log($('#wMsgImg').val());
        //     $('#wMsgForm').submit();
        // }

        //Autosave in the background with Ajax (bgs => background-save)
        const forceDelete = 0; // set to 1 (true) if storage space is a concern
        $(document).ready(function() {
            const inputs = document.querySelectorAll('.bgs-input');
            inputs.forEach(element => {
                const elementFeedback = document.getElementById(`${element.id}-feedback`);
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
                        case 'wMsgForm':
                            route = '{{ route('wMsg.save') }}'
                            break;
                        case 'autoRespsForm':
                            route = '{{ route('autoResps.save') }}'
                            break;
                        case 'serverSettsForm':
                            route = '{{ route('serverSetts.save') }}'
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

            const button_inputs = document.querySelectorAll('.bgs-input-btn');
            button_inputs.forEach(element => {
                const elementFeedback = document.getElementById(`${element.id}-feedback`);
                const errorContainer = document.getElementById(`${element.form.id}-errors`);

                $(element).on('click', function() {
                    elementFeedback.classList.remove('fa-check', 'fa-xmark');
                    elementFeedback.classList.add('fa-spinner');
                    elementFeedback.style.color = 'cornflowerblue';

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    console.log($(`#${element.form.id}`));
                    console.log($(`#${element.form.id}`).serialize());

                    $.ajax({
                        url: '{{ route('serverSetts.save') }}',
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

            const autoroles_form_id = 'autoRolesForm';
            const autoroles_input_id = 'autoRoles';
            new MultiSelectTag('autoRoles', {
                rounded: true,
                onChange: function(values) {
                    const elementFeedback = document.getElementById(`${autoroles_input_id}-feedback`);
                    const errorContainer = document.getElementById(`${autoroles_form_id}-errors`);

                    elementFeedback.classList.remove('fa-check', 'fa-xmark');
                    elementFeedback.classList.add('fa-spinner');
                    elementFeedback.style.color = 'cornflowerblue';

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    console.log($(`#${autoroles_form_id}`));
                    console.log($(`#${autoroles_form_id}`).serialize());

                    $.ajax({
                        url: '{{ route('autoRoles.save') }}',
                        type: 'POST',
                        data: $(`#${autoroles_form_id}`).serialize() +
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
