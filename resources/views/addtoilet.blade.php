@extends('layouts.app')

@section('content')
    <div class="container">

                    {{ Html::ul($errors->all()) }}

                    {{ Form::open(array('url' => 'toilets')) }}

                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('adress', 'Adress') }}
                        {{ Form::text('adress', Input::old('adress'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'City') }}
                        {{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        {{Form::file('image')}}
                    </div>


                    {{ Form::submit('Add toilet', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>
            </div>

@endsection
