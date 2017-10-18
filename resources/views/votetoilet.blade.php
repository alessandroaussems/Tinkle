@extends('layouts.app')

@section('content')

<div class="container">
  @if ($alreadyvoted)
    <div class="voteM">
      <h3 class="text-center">{{ $error }}</h3>
    </div>

  @else
    <h3>Score : {{$toilet->title}}</h3>
    {{Form::open(array('action' => 'ToiletController@votesubmit','method'=>'post') )  }}
    {{Form::token()}}
    {{ Form::hidden('invisibleid', $toilet->id) }}
    <div class="form-group">
      {{ Form::label('vote', 'Good') }}
      {{ Form::radio('vote', 'Good',true) }}<br>
      {{ Form::label('vote', 'Bad') }}
      {{ Form::radio('vote', 'Bad') }}
    </div>
    <div class="form-group">
      {{ Form::label('comment', 'Comment:') }}
      {{ Form::textarea('comment', Input::old('comment'), array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Submit', ['name' => 'action', 'class' => 'vote btn btn-success'])   }}
    {{ Form::close() }}

      @endif
      <a href="{{ url('/') }}" class="btn btn-primary">Go back </a>
</div>

@endsection
