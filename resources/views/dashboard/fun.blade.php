@extends('layouts.dashboard')

@section('content')
    <div class="card--header text-white p-2 me-4">
        <div class="row">
            <div class="col-12 text-center fs-3"><b>XYZ server settings</b></div>
        </div>
    </div>
    <div class="card--body p-sm-3 h-100 text-white rounded overflow-auto" style="overflow-x: hidden !important;">
        <hr class="me-2">

        <h2 class="text--cyan mb-3"><b>Fun Settings</b></h2>

        {{-- Pickup Lines --}}
        <form id="pickupsForm">
            @csrf
            <input type="hidden" name="guildId" id="guildId" value="1">

            <div class="row ps-4 pe-4 pt-3 mb-4 me-3 bg--black rounded">
                <h3>Pickup Lines</h3>

                <div class="mb-4">
                    {{-- Placeholder must be like this because reasons --}}
                    <textarea name="pickups" class="bgs-input form-control flex-fill" rows="3"
                        placeholder="I hope you know CPR, because you just took my breath away!
If you were a vegetable, you'd be a 'cute-cumber."></textarea>
                </div>
            </div>
        </form>

        {{-- Quotes --}}
        <form id="quotesForm">
            @csrf
            <input type="hidden" name="guildId" id="guildId" value="1">

            <div class="row ps-4 pe-4 pt-3 mb-4 me-3 bg--black rounded">
                <h3>Quotes</h3>

                <div class="mb-4">
                    {{-- Placeholder must be like this because reasons --}}
                    <textarea name="quotes" class="bgs-input form-control flex-fill" rows="3"
                        placeholder="Be yourself; everyone else is already taken.
A room without books is like a body without a soul."></textarea>
                </div>
            </div>
        </form>

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
            })
        });
    </script>
@endsection
