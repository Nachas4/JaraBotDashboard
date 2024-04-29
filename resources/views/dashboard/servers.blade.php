@extends('layouts.dashboard')

@section('content')
    <div class="card--header pt-2 me-4">
        <div class="text-center fs-3 text-uppercase text--teal text-decoration-underline">XYZ server settings</div>
    </div>

    <div class="card--body p-sm-3 h-100 pt-sm-2 text-white rounded overflow-auto" style="overflow-x: hidden !important;">

        <hr>
        <h2 class="text--cyan mb-3"><b>General Settings </b></h2>

        <div class="row ps-3 pe-3 ps-sm-4 pe-sm-4 pt-3 mb-4 bg--black rounded">
            <h3>Welcome message</h3>

            <div class="col-12 col-xl-6 col-md-6 mb-4 d-flex align-items-start flex-column">
                <textarea class="form-control flex-fill" id="exampleFormControlTextarea1" rows="3"
                    placeholder="We welcome ${user} to the server!"></textarea>
            </div>

            <div class="col-12 col-sm-6 col-xl-3 col-md-6 mb-4">
                <div class="row">

                    <div class="col-12 mb-3">
                        <h5>Channel</h5>
                        <select class="form-select">
                            <option>Select channel</option>
                            <option>Welcome</option>
                            <option>General</option>
                            <option>Talk About</option>
                            <option>Ect.</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <h5>Background Image</h5>
                        <input type="file" id="files" class="d-none" />
                        <label for="files" class="btn btn-primary button">Select file</label>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3 col-md-12 mb-4 d-flex justify-content-end">
                <img src="{{ asset('th3.png') }}" alt="" class="img-thumbnail" style="height: 150px;">
            </div>

        </div>
        <div class="row ps-4">
            <h3>Auto Role</h3>

            <div class="col-12 col-xl-3 col-md-6 mb-4">
                <select class="form-select">
                    <option>Select role</option>
                    <option>Welcome</option>
                    <option>General</option>
                    <option>Talk About</option>
                    <option>Ect.</option>
                </select>
                <label for="" class="text--grey ">Roles that every new user automatically gets</label>

            </div>
        </div>

        <div class="row ps-4">
            <h3>Auto Message</h3>
            <div class="col-12 col-xl-6 col-md-6 mb-4 d-flex align-items-start flex-column">
                <textarea class="form-control flex-fill" id="exampleFormControlTextarea1"
                    placeholder="We welcome ${user} to the server!"></textarea>
            </div>

            <div class="col-12 col-xl-3 col-md-6 mb-4">
                <h5>Set frequency</h5>
                <select class="form-select">
                    <option>Every:</option>
                    <option>Day</option>
                    <option>Week</option>
                    <option>Month</option>
                </select>
                <label for="" class="text--grey ">Message to be set at every given time automatically</label>
            </div>
            <div class="col-12 col-xl-3 col-md-6 mb-4">
                <h5>Timer</h5>
                <input type="time" name="" id="" class="form-control">
                <label for="" class="text--grey ">Message to be set at every given time automatically</label>
            </div>
        </div>
        <a href="" class="ms-4 text--grey btn btn-secondary bg--dark border-0">+ Add new black list</a>

        <hr>
        {{-- ---------------------- Moderation --------------------------- --}}

        <h2 class="text--cyan mb-3"><b>Moderation Settings </b></h2>

        <div class="row ps-4">
            <h3>Black listed words</h3>

            <div class="col-12 col-xl-6 col-md-6 d-flex align-items-start flex-column mb-3 mb-md-0">
                <textarea class="form-control flex-fill" id="exampleFormControlTextarea1"
                    placeholder="fuck, dick, mother fucker, bitch, ect."></textarea>
            </div>



            <div class="col-12 col-xl-3 col-md-6 mb-3 mb-md-0">
                <div class="row">

                    <div class="col-12 mb-3">
                        <h5>Channel</h5>

                        <select class="form-select">
                            <option>Select channel</option>
                            <option>Welcome</option>
                            <option>General</option>
                            <option>Talk About</option>
                            <option>Ect.</option>
                        </select>
                    </div>

                    <div class="col-12 mt-auto">
                        <h5>Penalty</h5>
                        <select class="form-select">
                            <option>TimeOut</option>
                            <option>Kick</option>
                            <option>Ban</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3 col-md-6">
                <h5>Timer</h5>
                <input type="time" name="" id="" class="form-control">
            </div>
        </div>
        <a href="" class="ms-4 text--grey btn btn-secondary mt-4 bg--dark border-0">+ Add new black list</a>



        {{-- <div class="row">
            
            <div class="col-12 col-xl-4 col-md-6 mb-4">
                <h3>Server status:</h3>
                <input class="form-control" type="text" name="asd" id="">
                <label for="">Example here!</label>
            </div>
            <div class="col-12 col-xl-4 col-md-6 mb-4">
                <h3>Server status:</h3>
                <input class="form-control" type="text" name="asd" id="">
                <label for="">Example here!</label>
            </div>

            <div class="col-12 col-xl-4 col-md-6 mb-4">
                <h3>Server status:</h3>
                <select class="form-control">
                    <option>Default select</option>
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                    <option>Option 4</option>
                </select>
                <label for="">Example here!</label>
            </div>
            <hr>

            <div class="col-12 col-xl-4 col-md-6 mb-4">
                <h3>Server status:</h3>
                <input class="form-control" type="text" name="asd" id="">
                <label for="">Example here!</label>
            </div>
            <div class="col-12 col-xl-4 col-md-6 mb-4">
                <h3>Server status:</h3>
                <input class="form-control" type="text" name="asd" id="">
                <label for="">Example here!</label>
            </div>

            <div class="col-12 col-xl-4 col-md-6 mb-4">
                <h3>Server status:</h3>
                <select class="form-control">
                    <option>Default select</option>
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                    <option>Option 4</option>
                </select>
                <label for="">Example here!</label>
            </div>
            <hr>
        </div>
 --}}



    </div>
@endsection
