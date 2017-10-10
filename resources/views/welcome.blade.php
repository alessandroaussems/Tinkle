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
        <div class="infoContent">
          <header class="masthead">
            <div class="overlay">
              <div class="container">
                <div class="infoHeroContent">
                  <img src="{{ asset('img/logo-text.png') }}" />
                  <hr>
                  <h1 class="text">A toilet any place any time</h1>
                </div>
              </div>
            </div>
          </header>

          <section>
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-6 order-2">
                  <div class="p-5">
                    <img class="img-fluid rounded-circle" src="https://unsplash.it/500/500?image=836" alt="">
                  </div>
                </div>
                <div class="col-md-6 order-1">
                  <div class="p-5">
                    <h2 class="display-4">tinkle blablablabla</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <!-- Footer -->
          <footer class="py-5 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
            </div>
            <!-- /.container -->
          </footer>
        </div>















@endsection
