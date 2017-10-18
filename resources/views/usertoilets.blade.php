@extends('layouts.app')

@section('content')


  @if(count($toilets) == 0)
      <h2 class="text-center">You haven't added any toilets.</h2>
      <a href="{{ url('toilets/create') }}" class="btn btn-primary">Add a toilet</a>
  @else
  @foreach($toilets as $key => $value)


      <div class="card">
          <img class="card-img" src="{{ asset('img/toiletuploads/')."/".$value->picture }}" alt="header" />
          <div class="EditDelete">
              <a class="btn btn-small btn-info" href="{{ URL::to('toilets/' . $value->id . '/edit') }}">Edit</a>
              {{ Form::open(array('url' => 'toilets/' . $value->id, 'class' => 'pull-right')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
              {{ Form::close() }}
          </div>
          <div class="card-info">
              <h1 class="card-title">{{ $value->title }}</h1>
              <div class="card-icon">6</div>
              <p class="card-author"></p>
              <p class="card-stats">
                  6 <i class="material-icons">thumb_up   </i>
                  6 <i class="material-icons">&#xe8db;   </i>
              </p>


          </div>
      </div>







    </div>


  @endforeach
  @endif



@endsection
