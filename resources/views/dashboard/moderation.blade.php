@extends('layouts.dashboard')

@section('content')
    <div class="card--header text-white p-2 me-4">
        <div class="row">
            <div class="col-12 text-center fs-3"><b>XYZ server settings</b></div>
        </div>
    </div>

    <div class="card--body p-sm-3 h-100 text-white rounded overflow-auto" style="overflow-x: hidden !important;">
        <div class="me-3">

            <hr class="me-2">

            <h2 class="text--cyan mb-3"><b>Moderation Settings</b></h2>

            {{-- Mod Message Channels --}}
            <form id="modMsgChsForm">
                @csrf
                <input type="hidden" name="guildId" id="guildId" value="1">

                <div class="row ps-4 pe-4 pt-3 mb-4 me-3 bg--black rounded">
                    <h3>Mod Message Channels</h3>

                    <div class="col-12 col-sm-6 col-xl-4 mb-4">
                        <label for="kickMsgCh" class="form-label">Kick Message Channel</label>
                        <select name="kickMsgCh" class="bgs-input form-select">
                            <option disabled>Select channel</option>
                            <option value="0">None</option>
                            <option value="619514971868626978">General</option>
                            <option value="981514971867836971">Talk About</option>
                            <option value="762514972868926974">Etc.</option>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-4 mb-4">
                        <label for="banMsgCh" class="form-label">Ban Message Channel</label>
                        <select name="banMsgCh" class="bgs-input form-select">
                            <option disabled>Select channel</option>
                            <option value="0">None</option>
                            <option value="619514971868626978">General</option>
                            <option value="981514971867836971">Talk About</option>
                            <option value="762514972868926974">Etc.</option>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-4 mb-4">
                        <label for="toMsgCh" class="form-label">Timeout Message Channel</label>
                        <select name="toMsgCh" class="bgs-input form-select">
                            <option disabled>Select channel</option>
                            <option value="0">None</option>
                            <option value="619514971868626978">General</option>
                            <option value="981514971867836971">Talk About</option>
                            <option value="762514972868926974">Etc.</option>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-4 mb-4">
                        <label for="blklMsgCh" class="form-label">Blacklist Message Channel</label>
                        <select name="blklMsgCh" class="bgs-input form-select">
                            <option disabled>Select channel</option>
                            <option value="0">None</option>
                            <option value="619514971868626978">General</option>
                            <option value="981514971867836971">Talk About</option>
                            <option value="762514972868926974">Etc.</option>
                        </select>
                    </div>

                </div>
            </form>

            {{-- Moderators --}}
            <form id="moderatorsForm">
                @csrf
                <input type="hidden" name="guildId" id="guildId" value="1">

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="ps-4 pe-4 mb-4 me-3 no--search">
                            <h3>Moderators</h3>
                            <div class="d-flex flex-row flex-fill align-items-center">
                                <select name="moderators[]" id="moderators" multiple>
                                    <option value="1">Nachas4</option>
                                    <option value="2">Klozon</option>
                                    <option value="3">hason4</option>
                                </select>
                            </div>

                            <label for="moderators" class="text--grey ">These people have the power to perform kicks, bans
                                and timeouts.</label>
                        </div>
                    </div>
                </div>
            </form>

            {{-- Blacklist --}}
            <form id="blacklistForm">
                @csrf
                <input type="hidden" name="guildId" id="guildId" value="1">

                <div class="row ps-4 pe-4 pt-3 mb-4 me-3 bg--black rounded">
                    <h3>Word Blacklist</h3>

                    <div class="mb-4">
                        {{-- Placeholder must be like this because reasons --}}
                        <textarea name="blacklist" class="bgs-input form-control flex-fill" rows="3">kill, stab, murder, hurt, die</textarea>
                        <label for="blacklist">Messages containing blacklisted words will be automatically deleted and
                            logged to the Blacklist Mod Message Channel.</label>
                    </div>
                </div>
            </form>
        </div>

    </div>


    <script>
        //Autosave in the background with Ajax (bgs => background-save)
        $(document).ready(function() {
            const inputs = document.querySelectorAll('.bgs-input');
            inputs.forEach(element => {
                $(element).on('focusout', function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    console.log($(`#${element.form.id}`));
                    console.log($(`#${element.form.id}`).serialize());

                    $.ajax({
                        url: '{{ route('dashboard.save') }}',
                        type: 'POST',
                        data: $(`#${element.form.id}`).serialize() +
                            `&toSave=${element.form.id}`,
                        //debug
                        success: function(response) {
                            console.log(response);
                        }
                    });
                });
            });
            
            const moderators_form_id = 'moderatorsForm';
            new MultiSelectTag('moderators', {
                rounded: true,
                onChange: function(values) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    console.log($(`#${moderators_form_id}`));
                    console.log($(`#${moderators_form_id}`).serialize());

                    $.ajax({
                        url: '{{ route('dashboard.save') }}',
                        type: 'POST',
                        data: $(`#${moderators_form_id}`).serialize() +
                            `&toSave=${moderators_form_id}`,
                        //debug
                        success: function(response) {
                            console.log(response);
                        }
                    });
                }
            });
        });
    </script>
@endsection
