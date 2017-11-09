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
    <link href="{{ asset('css/foundation.css') }}" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>







<div id="app">

    <div class="hero-full-screen">

        <div class="top-content-section">
            <div class="top-bar">
                <div class="top-bar-left">
                    <ul class="menu">
                        <li class="menu-text"></li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="middle-content-section">

            <img src="img/logo-text.png" alt="logo">
            <hr>

        </div>
        <section>
            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class=" medium-12 large-6 cell">
                        <img class="img-responsive" src="img/t.png" alt="">
                    </div>
                    <div class="medium-12 large-6 cell">
                        <div class="inline">
                            <h2 class="display-4">Download our app today!</h2>
                            <p><b>We all know the feeling right? You are in the city having a great time when suddenly: You have to go to the toilet!
                                    Toilets are not always very clean specially for woman. That's where Tinkle comes in. Take the app find a toilet and here you go!
                                    People can now offer you to use there toilet. You want to offer your toilet? Register and add it! Join the Tinkle community and give
                                    everyone a toilet, any place, any time</b>

                            </p>
                            <img class="googlePlay" src="img/google-play-badge.png" alt="Download on Google Play!">
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <div class="bottom-content-section" data-magellan data-threshold="0">

        </div>

    </div>

    <div id="main-content-section" data-magellan-target="main-content-section">












        <div class="grid-container ">
            <h1 class="text-center tinkleTeam">Tinkle team</h1>
            <div class="grid-x grid-margin-x">
                <div class="medium-6 large-6 cell">
                    <div class="card-profile-stats">
                        <div class="card-profile-stats-intro">
                            <img class="card-profile-stats-intro-pic" src="img/ale.jpg" alt="profile-image" />
                            <div class="card-profile-stats-intro-content">
                                <h3><a href="https://alessandroaussems.be" target="_blank" >Alessandro Aussems</a></h3>
                                <p>Founder</p>
                            </div> <!-- /.card-profile-stats-intro-content -->
                        </div> <!-- /.card-profile-stats-intro -->
                    </div> <!-- /.card-profile-stats -->
                </div>
                <div class="medium-6 large-6 cell">
                    <div class="card-profile-stats">
                        <div class="card-profile-stats-intro">
                            <img class="card-profile-stats-intro-pic" src="img/pie.jpg" alt="profile-image" />
                            <div class="card-profile-stats-intro-content">
                                <h3><a href="https://pietermelis.be" target="_blank" >Pieter Melis</a></h3>
                                <p>Founder</p>
                            </div> <!-- /.card-profile-stats-intro-content -->
                        </div> <!-- /.card-profile-stats-intro -->
                    </div> <!-- /.card-profile-stats -->
                </div>
            </div>
        </div>








    </div>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Tinkle 2017</p>
        </div>
        <!-- /.container -->
    </footer>













<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/what-input.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/foundation.js') }}"></script>
    <script src="{{ asset('js/foundation/app.js') }}"></script>
</body>
</html>
