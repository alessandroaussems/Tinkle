@extends('layouts.app')

@section('content')

    <div class="header">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo-text2.png') }}" alt="logo"></a>
    </div>
    <div class=" center">
        <div class="detail">
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
                    <p><strong>Offered by:</strong> {{$user}}</p>

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
                <br>
                <a href="https://www.google.com/maps/dir/?api=1&destination={{$toilet->lat}},{{$toilet->long}}&travelmode=walking" class="button full" target="_blank">Navigate</a>

            </div>
            <br>
        </div>


    </div>

    <div class="container commentcontainer">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h1>Comments </h1>
                </div>
                <div class="comments-list">
                    @foreach($comments as $key => $value)
                    <div class="media">
                        <div class="media-body">

                            <h4 class="media-heading user_name"><strong>{{$value[0]}}</strong></h4>
                            {{$value[1]}}
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>


@endsection
