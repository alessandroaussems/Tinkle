@extends('layouts.app')

@section('content')

        <div class="toilet">
          <div class="onetoilet">
            <img src="{{ asset('img/toiletuploads/')."/".$toilet->picture }}" alt="">
            <h4>{{ $toilet->title }}</h4>

            <p>{{ $toilet->description}}</p>

            <p>{{ $toilet->adress }} {{ $toilet->city }}</p>
            <a href="https://www.google.com/maps/dir/?api=1&destination={{$toilet->lat}},{{$toilet->long}}&travelmode=walking" class="btn btn-primary full" target="_blank">Navigate</a>

          </div>


        </div>


@endsection
