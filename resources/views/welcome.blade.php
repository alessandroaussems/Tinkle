@extends('layouts.app')
@section('content')
        <div class="home">

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
