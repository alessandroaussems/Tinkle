@extends('layouts.app')

@section('content')


  @if(count($toilets) == 0)
      <h2 class="text-center">You haven't added any toilets.</h2>
      <a href="{{ url('toilets/create') }}" class="btn btn-primary">Add a toilet</a>
  @else
  @foreach($toilets as $key => $value)
    <div class="toilet">
      <div class="onetoilet">
        <h3>{{ $value->title }}</h3>
        <div class="toiletuploads">
          <img src="{{ asset('img/toiletuploads/')."/".$value->picture }}" alt="">
        </div>
      </div>



<div class="EditDelete">
  <a class="btn btn-small btn-info" href="{{ URL::to('toilets/' . $value->id . '/edit') }}">Edit</a>
  {{ Form::open(array('url' => 'toilets/' . $value->id, 'class' => 'pull-right')) }}
  {{ Form::hidden('_method', 'DELETE') }}
  {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
  {{ Form::close() }}
</div>



    </div>


  @endforeach
  @endif



@endsection
