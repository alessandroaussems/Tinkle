@extends('layouts.app')

@section('content')

<div class="container">
  @if(count($toilets) == 0)
      <h2 class="text-center">You haven't added any toilets.</h2>
      <a href="{{ url('toilets/create') }}" class="btn btn-primary">Add a toilet</a>
  @else
  @foreach($toilets as $key => $value)
    <div class="toilet">
      <img src="{{ asset('img/toiletuploads/')."/".$value->picture }}" alt="">
      <h4>{{ $value->title }}</h4>
      <p>{{ $value->adress }} {{ $value->city }}</p>
              <a class="btn btn-small btn-info" href="{{ URL::to('toilets/' . $value->id . '/edit') }}">Edit</a>
              {{ Form::open(array('url' => 'toilets/' . $value->id, 'class' => 'pull-right')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
              {{ Form::close() }}


    </div>


  @endforeach
  @endif
</div>


@endsection
