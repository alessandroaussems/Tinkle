@extends('layouts.app')

@section('content')
    <div class="header">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo-text2.png') }}" alt="logo"></a>
    </div>

    <div class="container">


                    {{ Html::ul($errors->all(), array('class' => 'errors'))}}

                    {{ Form::model($toilet, array('route' => array('toilets.update', $toilet->id), 'method' => 'PUT','files' => true)) }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        {{ Form::label('title', 'Title',array('class' => 'required'))  }}
                        {{ Form::text('title', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('adress', 'Address',array('class' => 'required'))  }}
                        {{ Form::text('adress', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'City',array('class' => 'required'))  }}
                        {{ Form::text('city', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Description',array('class' => 'required')) }}
                        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
                    </div>


                    <div class="form-group">

                        {{ Form::checkbox('disabledcancome', 'true')}}
                        <i class="material-icons">&#xE914;</i> Accesible for Disabled
                    </div>

                    <p>How often are you home? (0 is never &amp; 100 is always)</p>
                    <input  name="percentagehome"  type="number" id="sliderOutput1">

                    <div class="slider" data-slider data-initial-start="{{$toilet->percentagehome}}" data-end="100">

                        <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput1"></span>
                        <span class="slider-fill" data-slider-fill></span>

                    </div>


                    <div class="form-group">
                        <input type="file" name="image" id="image" class="required">
                    </div>

                    {{ Form::submit('Edit toilet!', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>
                <br>
            </div>

@endsection
