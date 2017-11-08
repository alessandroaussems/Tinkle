@extends('layouts.app')

@section('content')

    <div class="header">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo-text2.png') }}" alt="logo"></a>
    </div>
    <div class="card">
        @if($toilet->disabledcancome != NULL)
            <div class="card-icon accessible">
                <i class="material-icons">accessible</i>
            </div>
        @endif
        <img class="card-img" src="{{ asset('img/toiletuploads/')."/".$toilet->picture }}" alt="header" />
            <div class="detail">
                <div class="card-info">
                    <h1 class="card-title">{{ $toilet->title }}</h1>

                    <p class="card-stats">
                        {{$goodvotes}} <i class="material-icons">thumb_up   </i>
                        {{$badvotes}} <i class="material-icons">&#xe8db;   </i>
                    </p>
                    <p>Offered by: {{$user}}</p>

                </div>

                <p>{{ $toilet->description}}</p>
                <br>


                <p><b>Address:</b></p>
                <p class="adress">{{ $toilet->adress }} {{ $toilet->city }}</p>

                <p><b>Availability</b></p>
                <div class="progress" role="progressbar" tabindex="0" aria-valuenow="{{$toilet->percentagehome}}" aria-valuemin="0" aria-valuetext="25 percent" aria-valuemax="100">
                  <span class="progress-meter" style="width: {{$toilet->percentagehome}}%">
                    <p class="progress-meter-text">{{$toilet->percentagehome}}%</p>
                  </span>
                </div>

                <a href="https://www.google.com/maps/dir/?api=1&destination={{$toilet->lat}},{{$toilet->long}}&travelmode=walking" class="btn btn-primary full" target="_blank">Navigate</a>

            </div>
        <br>

    </div>










        <div class="comments">
          <ul>
            @foreach($comments as $key => $value)
              <li>
                <div class="comment">
                  <h4>{{$value[0]}}</h4>
                  <p>{{$value[1]}}</p>
                </div>
              </li>
              @endforeach
          </ul>
        </div>


@endsection
