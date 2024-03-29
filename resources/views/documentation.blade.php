@extends('layouts.docs-dashboard')

@section('content')
    <div class="text-white p-2 mb-3">
        <div class="row">
            <div class="col-12 text-center text-light fs-3"><i class="fa-solid fa-house me-2"></i><b>General Commands</b>
            </div>
        </div>
    </div>
    <div class="card--body p-3 h-100 text-white rounded overflow-auto">

        <div class="row">
            <hr>
            <div class="col-12 col-md-6 mb-4">
                <h3>Setting the Prefix</h3>

                <div class="card-- mt-3" style="height: fit-content">
                    <div class="">
                        <div class="">
                            <h4><b>setprefix</b></h4>

                            <p>Usage: <span class="usage-example">&setprefix {prefix}</span></p>
                        </div>

                        <div class="">
                            <p>Have you grown bored of using the same character for everything, or another bot is using the same
                                prefix? Not a problem anymore!</p>
                        </div>
                    </div>
                </div>
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


    </div>
@endsection
