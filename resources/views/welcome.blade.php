@extends('layouts.app')
@section('content')
        <div class="content">

            @auth
            <!-- Page Content -->
            <div class="bg">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <a href="{{ url('/findatoilet') }}" role="button" class="btn btn-secondary btn-lg homeButton">Find me a toilet</a>
                  </div>
                </div>
              </div>
            </div>



                @else
                    <a href="{{ route('login') }}" role="button" class="btn btn-secondary btn-lg homeButton">Login</a>
                    <a href="{{ route('register') }}" role="button" class="btn btn-secondary btn-lg homeButton">Register</a>
            @endauth
        </div>
@endsection
