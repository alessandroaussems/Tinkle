@extends('layouts.app')

@section('content')

        <div class="toilet">
          <div class="onetoilet">
            <img src="{{ asset('img/toiletuploads/')."/".$toilet->picture }}" alt="">
            <h3>{{ $toilet->title }}</h3>

            <p>{{ $toilet->description}}</p>

            <b><p>{{ $toilet->adress }} {{ $toilet->city }}</p></b>
            <a href="https://www.google.com/maps/dir/?api=1&destination={{$toilet->lat}},{{$toilet->long}}&travelmode=walking" class="btn btn-primary full" target="_blank">Navigate</a>

          </div>


        </div>


@endsection
