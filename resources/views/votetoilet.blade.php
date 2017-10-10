@extends('layouts.app')

@section('content')

<div class="container">
  @if ($alreadyvoted)
    <div class="voteM">
      <h3 class="text-center">{{ $error }}</h3>
    </div>

  @else
    <h3>Score : {{$toilet->title}}</h3>
    {{Form::open(array('action' => 'ToiletController@votesubmit', 'files'=>true,'method'=>'post') )  }}
    {{Form::token()}}
    {{ Form::hidden('invisibleid', $toilet->id) }}
    {{ Form::submit('Good', ['name' => 'action', 'class' => 'vote btn btn-success'])   }}
    {{ Form::submit('Bad', ['name' => 'action', 'class' => 'vote btn btn-danger']) }}
    {{ Form::close() }}

      @endif
      <a href="{{ url('/') }}" class="btn btn-primary">Go back </a>
</div>

@endsection
