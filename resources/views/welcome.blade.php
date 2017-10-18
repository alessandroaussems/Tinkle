@extends('layouts.app')
@section('content')
        <div>

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
















@endsection
