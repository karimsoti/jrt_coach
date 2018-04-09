@extends('layouts.welcome')

@section('content')




<div class="contact1 ">
    <div class="container-contact1">

        <div class="container">
            <!--            <h2>Dynamic Tabs</h2>
                        <p>To make the tabs toggleable, add the data-toggle="tab" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>-->

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Add New Agent</a></li>
                <li><a data-toggle="tab" href="#menu1">Edit Agent</a></li>
                <!--                <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                                <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
            </ul>

            <div class="tab-content">


                <!---------------------                                                                            ------------------------First tab--------------------------------------->
                <div id="home" class="tab-pane fade in active">


                    <!--<div   class='pos-center'>-->
                    <form method="post" action="{{route('insert_agent')}}">
                        {{csrf_field()}}
                        <span class="contact1-form-title">
                            Add New Agent
                        </span>

                        <input type='text' name='first_name' class="wrap-input1 input1" placeholder="First Name" required>
                        <input type='text' name='last_name' class="wrap-input1 input1" placeholder="Last Name" required>

                        <input type='email' name='email' class="wrap-input1 input1" placeholder='Email'required>
                        <select name='team_id' class="wrap-input1 input1" placeholder='Team' required>
                            <option value=''>Select a Team Lead</option>
                            @foreach($team as $teams)
                            <option value='{{$teams->id}}'>{{$teams->name}}</option>
                            @endforeach
                        </select>

                        <input type="submit" class='btn btn-danger'>
                    </form>
                </div>

                <!---------------------------------------------Second tab--------------------------------------->

                <div id="menu1" class="tab-pane fade">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <!--<th>Agent ID</th>-->
                                <th>Agent</th>
                                <!--<th>Team Lead</th>-->
                                <th>change</th>
                            </tr>
                        </thead>


                        @foreach($agents as $agent)
                        <form action="{{route('change_team', $agent->agent_id)}}" method="post">
                            {{csrf_field()}}


                            <tr>                   

                                <td>{{$agent->agent_name}}</td>

                                <td>
                                    <input type="submit" value="Update" class="btn btn-success">
                                </td>



                            </tr>

                        </form>

                        @endforeach 
                    </table>
                </div>

                <!--                <div id="menu2" class="tab-pane fade">
                                    <h3>Menu 2</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                </div>
                                <div id="menu3" class="tab-pane fade">
                                    <h3>Menu 3</h3>
                                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>-->
            </div>
        </div>



    </div>
</div>

@endsection 