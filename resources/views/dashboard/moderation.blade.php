@extends('layouts.dashboard')

@section('content')
    <div class="card--header text-white p-2 me-4">
        <div class="row">
            <div class="col-12 text-center fs-3"><b>XYZ server settings</b></div>
        </div>
    </div>
    <div class="card--body p-sm-3 h-100 text-white rounded overflow-auto" style="overflow-x: hidden !important;">
        <div class="me-3">
            <hr>

            {{-- ---------------------- Moderation --------------------------- --}}

            <h2 class="text--cyan mb-3"><b>Moderation Settings </b></h2>

            <div class="row ps-4 mb-4">
                <h3>Moderating roles</h3>
                <div class="col-12 col-lg-12 col-xl-6 no--search">
                    <select name="roles[]" id="roles" multiple>
                        <option value="1">Admin</option>
                        <option value="2">Staff</option>
                        <option value="3">Moderator</option>
                        <option value="4">Member</option>
                        <option value="5">Supporter</option>
                    </select>
                </div>
            </div>

            <div class="row ps-4 mb-3">
                <div class="col-6 mb-3">
                    <h3>Ban message</h3>
                    <textarea name="banMsg" class="form-control" rows="2" id="exampleFormControlTextarea1"
                        placeholder="{user} got banned for {reason} for {time}"></textarea>
                </div>
                <div class="col-6 mb-3">
                    <h3>Kick message</h3>
                    <textarea name="kickMsg" class="form-control" rows="2" id="exampleFormControlTextarea1"
                        placeholder="{user} got kicked from {channel}"></textarea>
                </div>
                <div class="col-6 mb-3">
                    <h3>TimeOut message</h3>
                    <textarea name="timeoutMsg" class="form-control" rows="2" id="exampleFormControlTextarea1"
                        placeholder="{user} got muted for {time}"></textarea>
                </div>
                <div class="col-6 mb-3">
                    <h3 class="fs-sm-4">Quarantine message</h3>
                    <textarea name="quartMsg" class="form-control" rows="2" id="exampleFormControlTextarea1"
                        placeholder="{user} was puted into Quarantine"></textarea>
                </div>
            </div>



            <h3>Black listed words</h3>
            <hr>
            <div id="blackLists">
                <div class="row ps-4 mt-4" id="template">
                    <div class="col-12 col-xl-12 col-md-12 mb-2">
                        <textarea name="blTextID" class="form-control" rows="3" id="exampleFormControlTextarea1"
                            placeholder="fuck, dick, mother fucker, bitch, ect."></textarea>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-5 mb-3 no--search">
                                <h5>Channels</h5>
                                <select name="channelsID[]" id="channelsID" multiple>
                                    <option value="-1">All</option>
                                    <option value="channelID">Welcome</option>
                                    <option value="channelID">General</option>
                                    <option value="channelID">Talk About</option>
                                    <option value="channelID">Ect.</option>
                                </select>
                            </div>

                            <div class="col-4">
                                <h5>Penalty</h5>
                                <select class="form-select" name="penaltyID">
                                    <option value="timeout">TimeOut</option>
                                    <option value="kick">Kick</option>
                                    <option value="ban">Ban</option>
                                    <option value="quart">Quarantine</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <h5>Timer (hour)</h5>
                                <input name="timeID" id="" class="form-control" type="number" min="0.1"
                                    value="1" step="0.1">
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
            </div>
            <a onclick="newBlackList()" id="btnBlackList" class="ms-4 text--grey btn btn-secondary mt-4 border-0">+ Add new
                black list</a>
        </div>

    </div>
    <script>
        new MultiSelectTag('roles')
        new MultiSelectTag('channelsID')

        let btn = document.getElementById('btnBlackList');
        let containerBlackList = document.getElementById('blackLists');
        let id = 0;
        let newBlackList = () => {
            let template = ` <div class="col-12 col-xl-12 col-md-12 mb-2">
                        <textarea name="blText${id}" class="form-control" rows="3" id="exampleFormControlTextarea1"
                            placeholder="fuck, dick, mother fucker, bitch, ect." ></textarea>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-5 mb-3 no--search">
                                <h5>Channels</h5>
                                <select name="channels${id}[]" id="channels${id}" multiple>
                                    <option value="-1">All</option>
                                    <option value="channelID">Welcome</option>
                                    <option value="channelID">General</option>
                                    <option value="channelID">Talk About</option>
                                    <option value="channelID">Ect.</option>
                                </select>
                            </div>

                            <div class="col-4">
                                <h5>Penalty</h5>
                                <select class="form-select" name="penalty${id}">
                                    <option value="timeout">TimeOut</option>
                                    <option value="kick">Kick</option>
                                    <option value="ban">Ban</option>
                                    <option value="quart">Quarantine</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <h5>Timer (hour)</h5>
                                <input name="time${id}" id="" class="form-control" type="number" min="0.1" value="1" step="0.1" >
                            </div>
                        </div>
                    </div>`
            let div = document.createElement('div');
            div.classList.add("row", "ps-4", "mt-4");
            div.innerHTML = template + '<hr class="mt-3">';

            // Append the cloned template to the container
            containerBlackList.appendChild(div);
            console.log(div);
            console.log('id :>> ', id);
            new MultiSelectTag("channels" + id);
            id++;
        };
    </script>
@endsection
