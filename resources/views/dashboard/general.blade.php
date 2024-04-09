@extends('layouts.dashboard')

@section('content')
    <div class="card--header text-white p-2 me-4">
        <div class="row">
            <div class="col-12 text-center fs-3"><b>XYZ server settings</b></div>
        </div>
    </div>
    <div class="card--body p-sm-3 h-100 text-white rounded overflow-auto" style="overflow-x: hidden !important;">
        <form id="general" action="#">
            @csrf
            <div class="me-3">
                <hr class="me-2">

                <h2 class="text--cyan mb-3"><b>General Settings </b></h2>

                <div class="row ps-sm-4 pe-sm-4 pt-3 mb-4 bg--black rounded">
                    <h3>Welcome message</h3>

                    <div class="col-12 col-xl-6 col-md-6 mb-4 d-flex align-items-start flex-column">
                        <textarea name="wMsg" class="input form-control flex-fill" id="exampleFormControlTextarea1" rows="3"
                            placeholder="We welcome ${user} to the server!"></textarea>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3 col-md-6 mb-4">
                        <div class="row">

                            <div class="col-12 mb-3">
                                <h5>Channel</h5>
                                <select name="wMsgChanel" class="input form-select">
                                    <option disabled>Select channel</option>
                                    <option value="chanelID">Welcome</option>
                                    <option value="chanelID">General</option>
                                    <option value="chanelID">Talk About</option>
                                    <option value="chanelID">Ect.</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <h5>Background Image</h5>
                                <input name="wMsgImg" type="file" id="files" class="input d-none" />
                                <label for="files" class="btn btn-primary button">Select file</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3 col-md-12 mb-4 d-flex justify-content-end">
                        <img src="{{ asset('th3.png') }}" alt="" class="img-thumbnail" style="height: 150px;">
                    </div>

                </div>
                <div class="row ps-4 pe-4">
                    <div class="col-12 col-xl-6 col-xxl-4 col-md-6 mb-4">
                        <h3>Bot prefix</h3>
                        <input type="text" name="prefix" class="input form-control" id="">
                        <label for="" class="text--grey ">Roles that every new user automatically gets</label>
                    </div>
                    <div class="col-12 col-xl-6 col-xxl-4  col-md-6 mb-4">
                        <h3>Auto Role</h3>
                        <select name="autoRole" class="input form-select">
                            <option disabled>Select role</option>
                            <option value="admin">admin</option>
                            <option value="moderator">moderator</option>
                            <option value="member">member</option>
                            <option value="staff">staff</option>
                            <option value="etc">Ect.</option>
                        </select>
                        <label for="" class="text--grey ">Roles that every new user automatically gets</label>
                    </div>
                </div>

                <div class="row ps-4 pe-4 bg--black rounded pt-3">
                    <h3>Auto Message</h3>
                    <div class="col-12 col-xl-6 col-md-6 mb-4 d-flex align-items-start flex-column">
                        <textarea name="autoMsg" class="form-control flex-fill" id="exampleFormControlTextarea1"
                            placeholder="We welcome ${user} to the server!"></textarea>
                    </div>

                    <div class="col-12 col-xl-3 col-md-6 mb-4">
                        <h5>Set frequency</h5>
                        <select name="autoMsgFreq" class="input form-select">
                            <option disabled>Every:</option>
                            <option value="day">Day</option>
                            <option value="week">Week</option>
                            <option value="month">Month</option>
                        </select>
                        <label for="" class="text--grey ">Message to be set at every given time
                            automatically</label>
                    </div>
                    <div class="col-12 col-xl-3 col-md-6 mb-4">
                        <h5>Timer</h5>
                        <input name="autoMsgTime" id="" class="input form-control" type="time">
                        <label for="" class="text--grey ">Message to be set at every given time
                            automatically</label>
                    </div>
                </div>
                <hr>
            </div>
        </form>

    </div>



    <script>
        //auto Post in the background with Ajax 
        let inputs = document.querySelectorAll('.input');
        $(document).ready(function() {

            inputs.forEach(element => {
                $(element).on('focusout', function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{route("dashboard.savegeneral")}}',
                        type: 'POST',
                        //#general -> form ID
                        data: $("#general").serialize(),
                        //optional
                        success: function(response) {
                            console.log(response);
                        }
                    })
                });
            });

        });
    </script>
@endsection