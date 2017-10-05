@extends('layouts.app')

@section('content')

@if ($alreadyvoted)
    <p>{{ $error }}</p>
@else
<div class="container">
  <h3>Score : {{$toilet->title}}</h3>
  {{Form::open(array('action' => 'ToiletController@votesubmit', 'files'=>true,'method'=>'post') )  }}
  {{Form::token()}}
  {{ Form::hidden('invisibleid', $toilet->id) }}
  {{ Form::submit('Good', ['name' => 'action', 'class' => 'vote btn btn-primary'])   }}
  {{ Form::submit('Bad', ['name' => 'action', 'class' => 'vote btn btn-primary']) }}
  {{ Form::close() }}
</div>

    @endif
@endsection
