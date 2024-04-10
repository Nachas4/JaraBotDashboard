@extends('layouts.docs-dashboard')

@section('content')
    <div class="card--body p-3 text-white rounded">
        <div class="d-flex mb-4" style="gap:20px;">
            <a class="btn btn-primary btn-nav" id="general">general</a>
            <a class="btn btn-primary btn-nav" id="moderation">moderation</a>
            <a class="btn btn-primary btn-nav" id="minigame">minigame</a>
            <a class="btn btn-primary btn-nav" id="fun">fun</a>
        </div>
        <div id="docsContainer">

        </div>
    </div>

    <script>
        let btns = document.getElementsByClassName('btn-nav');

        $(document).ready(function() {
            for (btn of btns) {
                $(btn).on('click', function(button) {
                    let routeName = $(this).attr('id');
                    let url = "{{ route('dashboard.docs', ['subject' => ':subject']) }}";
                    url = url.replace(':subject', routeName);
                    $('#docsContainer').load(url);
                });
            }
        });
    </script>
@endsection
