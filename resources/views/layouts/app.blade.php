<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <link rel="icon" type="image/png" href="{{ asset('img/maplogo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{ config('app.name', 'Tinkle') }}</title>

    <!-- Styles -->


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/foundation.css') }}" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container navContainer">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                      <div class="content">
                        <img src="{{ asset('img/logo-text2.png') }}" alt="logo">
                      </div>



                    </a>
                </div>
                <div class="content">
                  <div class="collapse navbar-collapse" id="app-navbar-collapse">
                      <!-- Left Side Of Navbar -->
                      <!-- Right Side Of Navbar -->
                      <ul class="nav navbar-nav navbar-right">
                          <!-- Authentication Links -->

                          @guest
                              <li><a href="{{ url('findatoilet') }}">Find a toilet</a></li>
                              <li><a href="{{ route('login') }}">Login</a></li>
                              <li><a href="{{ route('register') }}">Register</a></li>
                          @else
                                      <li><a href="{{ url('findatoilet') }}">Find a toilet</a></li>
                                      <li><a href="{{ url('toilets') }}">View my toilets  </a></li>
                                      <li><a href="{{ url('toilets/create') }}">Add a toilet</a></li>
                                      <li>
                                          <a href="{{ route('logout') }}"
                                              onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                              Logout
                                          </a>

                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
                                      </li>

                          @endguest
                      </ul>
                  </div>
                </div>


            </div>
        </nav>


        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/what-input.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/foundation.js') }}"></script>
    <script src="{{ asset('js/foundation/app.js') }}"></script>
</body>
</html>
