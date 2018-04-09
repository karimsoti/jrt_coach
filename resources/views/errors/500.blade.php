@extends('layouts.welcome')

@section('content')
<div class="contact1">
    <div class='container-contact1'>
        <div class='center'>
            <!--<h1 class=''>500</h1>-->
            <br>
            <h2 class=''>{{$exception->getMessage()}}</h2>
            <br>
            <!--<a class='btn btn-default btn-danger'href="{{ url()->previous() }}">go back </a>-->            
            @if(!empty($id))

            <form method="post" action="{{route('edit', $id)}}">


                {{csrf_field()}}
                <input type="submit" value="Go Back" class="btn btn-danger">
            </form>

            @else
            <a class='btn btn-default btn-danger'href="{{ url()->previous() }}">go back </a>            

            @endif

        </div>
    </div>
</div>

@endsection