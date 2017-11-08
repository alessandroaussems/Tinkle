@extends('layouts.app')

@section('content')

    <div class="header">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo-text2.png') }}" alt="logo"></a>
    </div>
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    @if(count($toilets) == 0)
        <h2 class="text-center">You haven't added any toilets.</h2>
        <a href="{{ url('toilets/create') }}" class="btn btn-primary">Add a toilet</a>
    @else
        @foreach($toilets as $key => $value)


            <div class="card">
                @if($value->disabledcancome != NULL)
                    <div class="card-icon accessible">
                        <i class="material-icons">accessible</i>
                    </div>
                @endif
                <img class="card-img" src="{{ asset('img/toiletuploads/')."/".$value->picture }}" alt="header" />
                <div class="EditDelete">
                    <a class="btn btn-small btn-info edit" href="{{ URL::to('toilets/' . $value->id . '/edit') }}">Edit</a>

                    {{ Form::open(array('url' => 'toilets/' . $value->id, 'class' =>'delete')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger ')) }}
                    {{ Form::close() }}

                </div>
                <div class="mainTitle">
                    <div class="card-info">
                        <h1 class="card-title">{{ $value->title }}</h1>

                        <p class="card-stats">
                            {{$value->goodvotes}} <i class="material-icons">thumb_up   </i>
                            {{$value->badvotes}} <i class="material-icons">&#xe8db;   </i>
                        </p>


                    </div>
                </div>
            </div>










        @endforeach
    @endif



@endsection