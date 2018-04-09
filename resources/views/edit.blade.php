@extends('layouts.welcome')

@section('content')
@if(!empty($entry))


<div class="contact1">
    <div class='container-contact1'>


        <form action='{{route('saveChanges',$entry->id)}}' method='post'>
            {{csrf_field()}}
            <div>
                <table class='table table-bordered table-light'>

                    <tr>
                        <td>Name:</td>
                        <td>{{$entry->agent}}</td>
                    </tr>
                    <tr>
                        <td>JIRA Number:</td>
                        <td>{{strtoupper($entry->jira_number) }}</td>
                    </tr>
                    <tr>
                        <td>JIRA Status:</td>

                        <td>{{$entry->jira_status}}</td>
                    </tr>

                    <tr>
                        <td>JRT Feedback:</td>

                        <td>{{$entry->jrt_feedback}}</td>
                    </tr>
                    <tr>
                        <td>Completed:</td>
                        <td><input type='radio' name='completed' value='1' id='complete'><label for="complete" >Yes </label> <input type='radio' name='completed' value='0' id='incomplete'> <label for="incomplete">No</label></td>
                    </tr>
                    <tr>
                        <td>Manager Notes:</td>
                        <td>
                            <textarea name='managerNotes' class="input1"></textarea>
                        </td>

                    </tr>
                    <tr>
                        <td>Coached by:</td>
                        <td>    <input type='text' name='coach' class="input1"></td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class='btn btn-primary' type='submit' value='Save'>

                            <a class='btn btn-danger' href="{{route('view_entries')}}">Cancel</a>
                        </td>
                    </tr>

                </table>


            </div>
    </div>
</form>

@else


@endif
@endsection