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
                <h1 class="text">A toilet any place any time</h1>
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

          <section>
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-6 order-2">
                  <div class="p-5">
                    <img class="img-responsive" src="{{ asset('img/t.png') }}" alt="">
                  </div>
                </div>
                <div class="col-md-6 order-1">
                  <div class="p-5">
                    <h2 class="display-4">Download our app today!</h2>
                    <p>We all know the feeling right? You are in the city having a great time when suddenly: You have to go to the toilet!
                      Toilets are not always very clean specially for woman. That's where Tinkle comes in. Take the app find a toilet and here you go!
                      People can know offer you to use there toilet. You want to offer your toilet? Register and add it! Join the Tinkle community and give
                      everyone a toilet, any place, any time
                      <img class="img-responsive googlePlay" src="{{ asset('img/google-play-badge.png') }}" alt="">

                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <!-- Footer -->
          <footer class="py-5 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright &copy; Tinkle 2017</p>
            </div>
            <!-- /.container -->
          </footer>
        </div>















@endsection
