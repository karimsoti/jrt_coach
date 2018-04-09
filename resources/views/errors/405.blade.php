@extends('layouts.welcome')

@section('content')
<div class="contact1">
    <div class='container-contact1'>
        <div class='center'>
            <h1 class=''>405</h1>
            <br>
            <!--<h2 class=''>An error occurred while trying to complete your request ...</h2>-->
            <h2 class=''>Good going... you broke it</h2>
            <!--<h2 class=''>Nice try</h2>-->
            <br>

            <a class='btn btn-default btn-danger 'href="{{ url()->previous() }}">go back </a>

        </div>
    </div>
</div>

@endsection