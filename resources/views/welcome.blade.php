@extends('layouts.app')
@section('content')
        <div class="content mobile">

            @auth
                @else
            @endauth
            <div class="container fill">
              <div id="map"></div>
            </div>
            <div class="logo">
              <div class="heroContent">
                <img src="{{ asset('img/logo-text.png') }}" />
                <hr>
                <h1 class="text">A toilet any place, any time</h1>
                <a class="btn btn-primary" href="{{ url('findatoilet') }}" role="button">Find a toilet</a>
              </div>
            </div>
        </div>
        <div class="desktop">
          <header class="masthead">
            <div class="overlay">
              <div class="container">
                <div class="infoHeroContent">
                  <img src="{{ asset('img/logo-text.png') }}" />
                  <hr>
                  <h1 class="text">A toilet any place, any time</h1>
                </div>
              </div>
            </div>
          </header>




          <!-- Footer -->
          <footer class="py-5 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright &copy; Tinkle 2017</p>
            </div>
            <!-- /.container -->
          </footer>
        </div>















@endsection
