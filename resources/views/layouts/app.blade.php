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


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/foundation.css') }}" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">

</head>


<body>
<div class="curtain-menu-button" data-curtain-menu-button>
    <div class="curtain-menu-button-toggle">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
</div>

<!-- the menu  -->
<div class="curtain-menu">
    <div class="curtain"></div>
    <div class="curtain"></div>
    <div class="curtain"></div>
    <div class="curtain-menu-wrapper">
        <ul class="curtain-menu-list menu vertical">
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

    <div id="app">
        @yield('content')
    </div>
<script src="http://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script>
    $('[data-curtain-menu-button]').click(function(){
        $('body').toggleClass('curtain-menu-open');
    })
</script>
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/what-input.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/foundation.js') }}"></script>
    <script src="{{ asset('js/foundation/app.js') }}"></script>
</body>
</html>
