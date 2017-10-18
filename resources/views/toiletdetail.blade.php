@extends('layouts.app')

@section('content')

        <div class="toilet">
          <div class="onetoilet">
            <h3>{{ $toilet->title }}</h3>
            <div class="toiletuploads">
              <img src="{{ asset('img/toiletuploads/')."/".$toilet->picture }}" alt="">
            </div>
            <div class="votes ">
              <p class="col-xs-6">{{$goodvotes}} <i class="material-icons">thumb_up   </i> </p>
              <p class="col-xs-6">{{$badvotes}} <i class="material-icons">&#xe8db;</i></p>
            </div>
            <p>{{ $toilet->description}}</p>
            <b class="adress"><p>{{ $toilet->adress }} {{ $toilet->city }}</p></b>
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
