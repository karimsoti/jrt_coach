@extends('layouts.welcome')

@section('content')
<div class="contact1">
    <div class='container-contact1'>
        <div class='center'>
            <h1 class=''>404</h1>
            <br>
            <!--<h2 class=''>Page not found</h2>-->
            <h2 class=''>{{$exception->getMessage()}}</h2>
            <br>

            <a class='btn btn-default btn-danger'href="{{ url()->previous() }}">go back </a>

        </div>
    </div>
</div>

@endsection