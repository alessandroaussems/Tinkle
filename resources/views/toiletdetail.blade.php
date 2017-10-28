@extends('layouts.app')

@section('content')


    <div class="card">
        @if($toilet->disabledcancome != NULL)
            <div class="card-icon accessible">
                <i class="material-icons">accessible</i>
            </div>
        @endif
        <img class="card-img" src="{{ asset('img/toiletuploads/')."/".$toilet->picture }}" alt="header" />
            <div class="container">
                <div class="card-info">
                    <h1 class="card-title">{{ $toilet->title }}</h1>

                    <p class="card-stats">
                        {{$goodvotes}} <i class="material-icons">thumb_up   </i>
                        {{$badvotes}} <i class="material-icons">&#xe8db;   </i>
                    </p>
                    <p><b>Offered by:</b> {{$user}}</p>

                </div>

                <p>{{ $toilet->description}}</p>
                <br>
                <p><b>How often is this toilet available?</b></p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$toilet->percentagehome}}"
                         aria-valuemin="0" aria-valuemax="100" style="width:{{$toilet->percentagehome}}%">
                        {{$toilet->percentagehome}}%
                    </div>
                </div>
                <p><b>Address:</b></p>
                <p class="adress">{{ $toilet->adress }} {{ $toilet->city }}</p>

                <a href="https://www.google.com/maps/dir/?api=1&destination={{$toilet->lat}},{{$toilet->long}}&travelmode=walking" class="btn btn-primary full" target="_blank">Navigate</a>

            </div>

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
