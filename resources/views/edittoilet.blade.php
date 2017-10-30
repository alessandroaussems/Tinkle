@extends('layouts.app')

@section('content')
    <div class="container">


                    {{ Html::ul($errors->all(), array('class' => 'errors'))}}

                    {{ Form::model($toilet, array('route' => array('toilets.update', $toilet->id), 'method' => 'PUT','files' => true)) }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('adress', 'Address') }}
                        {{ Form::text('adress', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'City') }}
                        {{ Form::text('city', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
                    </div>

                    <p>How often are you home? (0 is never &amp; 100 is always)</p>
                    <div class="slider" data-slider data-initial-start="0" data-end="100">
                        <span class="slider-handle"  data-slider-handle role="slider" tabindex="1"></span>
                        <span class="slider-fill" data-slider-fill></span>
                        <input name="percentagehome" type="hidden">
                    </div>

                    <div class="form-group">
                        {{ Form::label('disabledcancome', 'Accesible for Disabled') }}
                        {{ Form::checkbox('disabledcancome', 'true')}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        {{Form::file('image')}}
                    </div>


                    {{ Form::submit('Edit toilet!', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>
            </div>

@endsection
