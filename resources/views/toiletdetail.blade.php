@extends('layouts.app')

@section('content')

        <div class="toilet">
            <img src="{{ asset('img/toiletuploads/')."/".$toilet->picture }}" alt="">
            <h4>{{ $toilet->title }}</h4>
            <p>{{ $toilet->adress }} {{ $toilet->city }}</p>
            <p>{{ $toilet->description}}</p>
            <a href="https://www.google.com/maps/dir/?api=1&destination={{$toilet->lat}},{{$toilet->long}}&travelmode=walking" class="btn-primary" target="_blank">Navigate me!</a>


        </div>


@endsection
