@extends('layouts.app')

@section('content')
    <div class="container">

                    <h1>Edit toilet!</h1>

                    {{ Html::ul($errors->all()) }}

                    {{ Form::model($toilet, array('route' => array('toilets.update', $toilet->id), 'method' => 'PUT','files' => true)) }}

                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('adress', 'Adress') }}
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

                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        {{Form::file('image')}}
                    </div>


                    {{ Form::submit('Edit toilet!', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>
            </div>

@endsection
