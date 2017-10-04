@extends('layouts.app')
@section('content')
        <div class="content">

            @auth
                @else
            @endauth
            <div class="container fill">
              <div id="map"></div>
            </div>
            <div class="logo">
              <img src="{{ asset('img/logo-text.png') }}" />
              <h1 class="text">A toilet any place any time</h1>
              <a href="{{ route('register') }}">Find a toilet</a>
            </div>

        </div>
@endsection
