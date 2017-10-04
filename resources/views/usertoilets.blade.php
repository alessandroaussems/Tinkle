@extends('layouts.app')

@section('content')
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Title</td>
            <td>Adress</td>
            <td>City</td>
        </tr>
        </thead>
        <tbody>
        @foreach($toilets as $key => $value)
                <tr>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->adress }}</td>
                    <td>{{ $value->city }}</td>

                    <td>
                        <a class="btn btn-small btn-info" href="{{ URL::to('toilets/' . $value->id . '/edit') }}">Edit</a>
                        {{ Form::open(array('url' => 'toilets/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
@endsection
