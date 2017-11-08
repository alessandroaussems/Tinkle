@extends('layouts.app')

@section('content')
    <div class="header">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo-text2.png') }}" alt="logo"></a>
    </div>
<div class="container">


  <h2 class="text-center">Thanks for your vote!</h2>




      <a href="{{ url('/') }}" class="btn btn-primary">Back to the homepage!</a>
</div>

@endsection
