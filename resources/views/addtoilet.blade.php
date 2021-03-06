@extends('layouts.app')

@section('content')
    <div class="header">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo-text2.png') }}" alt="logo"></a>

    </div>
    <div class="container">

                    {{ Html::ul($errors->all(), array('class' => 'errors'))}}

                    {{ Form::open(['url' => 'toilets','files' => true])}}

                    <div class="form-group">
                        {{ Form::label('title', 'Title',array('class' => 'required'))  }}
                        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('adress', 'Adress',array('class' => 'required'))  }}
                        {{ Form::text('adress', Input::old('adress'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'City',array('class' => 'required'))  }}
                        {{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Description',array('class' => 'required'))  }}
                        {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">

                        {{ Form::checkbox('disabledcancome', 'true')}}
                        <i class="material-icons">&#xE914;</i> Accesible for Disabled
                    </div>

                    <p>How often are you home? (0 is never &amp; 100 is always)</p>
                    <input  name="percentagehome"  type="number" id="sliderOutput1">

                    <div class="slider" data-slider data-initial-start="0" data-end="100">

                        <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput1"></span>
                        <span class="slider-fill" data-slider-fill></span>

                    </div>


                    <div class="form-group">
                            <input type="file" name="image" id="image" class="required">
                    </div>


                    {{ Form::submit('Add toilet', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>
                <br>
            </div>

@endsection
