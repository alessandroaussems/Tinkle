@extends('layouts.app')

@section('content')

        <div class="toilet">
            <img src="{{ asset('img/toiletuploads/')."/".$toilet->picture }}" alt="">
            <h4>{{ $toilet->title }}</h4>
            <p>{{ $toilet->adress }} {{ $toilet->city }}</p>
            <p>{{ $toilet->description}}</p>


        </div>


@endsection
