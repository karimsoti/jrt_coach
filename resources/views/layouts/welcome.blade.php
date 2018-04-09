<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact V1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <!--<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/css/util.css">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


        <!--===============================================================================================-->
    </head>
    <body>

        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel white">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'JRTCoach') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    <!--<span class="caret"></span>-->
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <a class="dropdown-item" href="{{route('view_entries')}}">
                                        Coaching Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{route('manage_agent')}}">
                                        Manage Agents
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>


            @yield('content')

        </div>



        <!--====                ===========================================================================================-->
        <script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="/vendor/bootstrap/js/popper.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="/vendor/tilt/tilt.jquery.min.js"></script>
        <script type="text/javascript" src="/js/jquery.tablesorter.js"></script> 
        <script >
                                           $('.js-tilt').tilt({
                                               scale: 1.1
                                           })
        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
        <script>
                                           window.dataLayer = window.dataLayer || [];
                                           function gtag() {
                                               dataLayer.push(arguments);
                                           }
                                           gtag('js', new Date());

                                           gtag('config', 'UA-23581568-13');
        </script>

        <!--===============================================================================================-->
        <script src="/js/main.js"></script>

    </body>
</html>