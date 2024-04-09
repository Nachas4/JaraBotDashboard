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

            <div class="row">

                <div class="col-12 col-xl-6 col-md-6">
                    <h2 class="text--cyan mb-3"><b>Rizz or Pickup Lines </b></h2>
                    <textarea class="form-control" rows="8" id="exampleFormControlTextarea1"
                        placeholder="I hope you know CPR, because you just took my breath away! ;
If you were a vegetable, you'd be a 'cute-cumber.’"></textarea>
                    <label for="" class="text--grey ">Make sure to separate the Pickup lines with <b>;</b> symbol
                    </label>
                </div>

                <div class="col-12 col-xl-6 col-md-6">
                    <h2 class="text--cyan mb-3"><b>Quotes</b></h2>
                    <textarea class="form-control" rows="8" id="exampleFormControlTextarea1"
                        placeholder="Be yourself; everyone else is already taken. ;
A room without books is like a body without a soul."></textarea>
                    <label for="" class="text--grey ">Make sure to separate with <b>;</b> symbol
                    </label>
                </div>

            </div>

        </div>

    </div>
@endsection
