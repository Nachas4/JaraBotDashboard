@extends('layouts.dashboard')

@section('content')
    @php
        use App\Models\DcGuild;

        $guild = DcGuild::where('guild_id', $server)->first();

        $pickups = $guild->pickuplines()->get();
        $quotes = $guild->quotes()->get();
    @endphp

    <div class="d-flex justify-content-center card--header text-white p-2 mx-4 mb-3">
        <div class="text-center fs-3"><b>{{ $guild->name }} server settings</b></div>
    </div>

    <div class="card--body p-sm-3 h-100 text-white rounded overflow-auto" style="overflow-x: hidden !important;">
        <h2 class="text--cyan mb-3"><b>Fun Settings</b></h2>

        {{-- Pickup Lines --}}
        <form id="pickupsForm">
            @csrf
            <input type="hidden" name="dc_guild_id" id="dc_guild_id" value="1">

            <div class="row px-4 pt-3 mb-4 me-3 bg--black rounded">
                <h3>Pickup Lines</h3>

                <div class="mb-4">
                    <div class="d-flex">
                        {{-- Placeholder must be like this because reasons --}}
                        <textarea name="pickups" id="pickups" class="bgs-input form-control flex-fill" rows="3"
                            placeholder="I hope you know CPR, because you just took my breath away!
If you were a vegetable, you'd be a 'cute-cumber.">
@php
    if ($pickups !== null) {
        foreach ($pickups as $item) {
            echo trim($item->line) . "\r\n";
        }
    }
@endphp
                    </textarea>
                        <div class="d-flex align-items-end ps-2">
                            <i class="fa-solid fa-check fs-5" id="pickups-feedback" style="color: green"
                                data-title="Save Feedback"></i>
                        </div>
                    </div>

                    <div class="pt-2" id="pickupsForm-errors"></div>
                </div>
            </div>
        </form>

        {{-- Quotes --}}
        <form id="quotesForm">
            @csrf
            <input type="hidden" name="dc_guild_id" id="dc_guild_id" value="1">

            <div class="row px-4 pt-3 mb-4 me-3 bg--black rounded">
                <h3>Quotes</h3>

                <div class="mb-4">
                    <div class="d-flex">
                        {{-- Placeholder must be like this because reasons --}}
                        <textarea name="quotes" id="quotes" class="bgs-input form-control flex-fill" rows="3"
                            placeholder="Be yourself; everyone else is already taken.
A room without books is like a body without a soul.">
@php
    if ($quotes !== null) {
        foreach ($quotes as $item) {
            echo trim($item->content) . "\r\n";
        }
    }
@endphp
                        </textarea>
                        <div class="d-flex align-items-end ps-2">
                            <i class="fa-solid fa-check fs-5" id="quotes-feedback" style="color: green"
                                data-title="Save Feedback"></i>
                        </div>
                    </div>

                    <div class="pt-2" id="quotesForm-errors"></div>
                </div>

            </div>
        </form>
    </div>


    <script>
        //Autosave in the background with Ajax (bgs => background-save)
        const forceDelete = {{ config('app.forcedelete') }};
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
                        case 'pickupsForm':
                            route = '{{ route('pickups.save') }}'
                            break;
                        case 'quotesForm':
                            route = '{{ route('quotes.save') }}'
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
            })
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
