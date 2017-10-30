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

<<<<<<< HEAD
                    <div class="form-group">
                        {{ Form::label('percentagehome', 'How often are you home? (0 is never, 100 is always)') }}
                        {{ Form::text('percentagehome', Input::old('percentagehome'), array('class' => 'form-control')) }}

=======
                    <p>How often are you home? (0 is never &amp; 100 is always)</p>
                    <div class="slider" data-slider data-initial-start="0" data-end="100">

                        <span class="slider-handle"  data-slider-handle role="slider" tabindex="1"></span>
                        <span class="slider-fill" data-slider-fill></span>
                        <input name="percentagehome" type="hidden" >
>>>>>>> 391e8fcf8c7af5910cc5401f21dddaec2594909c
                    </div>


                    <div class="form-group">
                        {{ Form::label('disabledcancome', 'Accesible for Disabled') }}
                        {{ Form::checkbox('disabledcancome', 'true')}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('image', 'Image upload') }}
                        {{Form::file('image')}}
                    </div>


                    {{ Form::submit('Add toilet', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>
            </div>

@endsection
