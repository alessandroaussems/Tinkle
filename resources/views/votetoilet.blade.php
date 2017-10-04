@extends('layouts.app')

@section('content')
<h1>Vote Toilet!</h1>
@if ($alreadyvoted)
    <p>{{ $error }}</p>
@else
{{Form::open(array('action' => 'ToiletController@votesubmit', 'files'=>true,'method'=>'post') )  }}
{{Form::token()}}
{{ Form::hidden('invisibleid', $toilet->id) }}
{{ Form::submit('Up', ['name' => 'action']) }}
{{ Form::submit('Down', ['name' => 'action']) }}
{{ Form::close() }}
    @endif
@endsection
