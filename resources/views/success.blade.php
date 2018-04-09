
@extends('layouts.welcome')

@section('content')
<div class="contact1">
    <div class='container-contact1'>
        <div class='center'>
            <!--<h1 class=''>500</h1>-->
            <br>
            @if(!empty($msg))


            <div class="alert alert-success">
                <h2><strong>Success!</strong></h2> {{$msg}}
            </div>
            @endif
            <a class='btn btn-default btn-danger'href="{{ route('view_entries') }}">Back to Dashboard</a>
            <a class='btn btn-default btn-primary'href="{{ route('home') }}">Home</a>

        </div>
    </div>
</div>

@endsection
