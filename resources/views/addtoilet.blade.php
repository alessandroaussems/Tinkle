@extends('layouts.app')

@section('content')
    <div class="container">

                    {{ Html::ul($errors->all(), array('class' => 'errors'))}}

                    {{ Form::open(['url' => 'toilets','files' => true])}}

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
                        {{ Form::label('percentagehome', 'Percentagehome') }}
                        {{ Form::text('percentagehome', Input::old('percentagehome'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('disabledcancome', 'Accesible for Disabled') }}
                        {{ Form::checkbox('disabledcancome', 'true')}}
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
