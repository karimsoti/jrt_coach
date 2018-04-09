@extends('layouts.welcome')

@section('content')




<div class="contact1">
    <div class='container-contact1'>
        <h1 id='center'>Coaching Entries</h1>

        <table  id="myTable" class="tablesorter table table-bordered table-light rounded"> 
            <thead> 
                <tr>

                    <th>Name</th>
                    <th>JIRA</th>
                    <th>JIRA Status</th>
                    <th>Reason for blocking</th>
                    <!--<th>Region</th>-->
                    <th>Feedback</th>
                    <th>Completed</th>
                    <th>Manager Notes</th>
                    <th>Coached By</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)

                <tr>
                    <td>{{$entry->agent}}</td>
                    <td>{{strtoupper($entry->jira_number) }}</td>
                    <td>{{$entry->jira_status}}</td>
                    <td>{{$entry->jira_reason}}</td>
                    <td>{{$entry->jrt_feedback}}</td>
                    <td><?php ($entry->completed == 1) ? print 'True' : print 'False'; ?></td>
                    <td>{{$entry->manager_notes}}</td>
                    <td>{{$entry->coached_by}}</td>
            <form action='{{route('edit', $entry->id)}}' method ='post'>
                {{csrf_field()}}
                <td><input class="btn btn-info" type='submit' value='Change'></td>
                </tr>
                </tbody>

            </form>

            @endforeach

        </table>
    </div>
</div>

<script>

    $(document).ready(function ()
    {
        $("#myTable").tablesorter();
    }
    );
</script>

@endsection

