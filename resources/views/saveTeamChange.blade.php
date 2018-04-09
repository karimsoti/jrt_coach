@extends('layouts.welcome')

@section('content')


<div class="contact1">
    <div class='container-contact1'>

        <h1 id='center'>Change team</h1>
        <form id="change_form" method="post">

            <table id='spaced' class='table table-responsive '>
                <thead>
                    <tr>
                        <th>Agent</th>
                        <th>Current Team Lead</th>
                        <th>New Team Lead</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>        {{$agent->agent_name}}</td>
                        <td>       {{$agent->team_lead_name}}</td>




                        <td>  
                            <select name="change_tl" class="wrap-input1 input1" id="change_team" onchange="addPointerToIndex()">

                                @foreach($team as $teams)
                                <option value='{{$teams->id}}'>{{$teams->name}}</option>
                                @endforeach

                            </select>
                        </td>
                        {{csrf_field()}}
                        <td><input type="submit" value="Update" class="btn btn-success"></td>

                    </tr>

                </tbody>


            </table>
        </form>

    </div>
</div>

<script>
    window.onload = function () {
        var changeTeam = document.getElementById('change_team');
        var form = document.getElementById('change_form');
        form.onsubmit = function () {
            document.location.href = "{{route('php')}}";
        };
    };
</script>



@endsection