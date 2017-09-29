@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li><a href="{{ url('toilets') }}">View my toilets</a></li>
                        <li><a href="{{ url('toilets/create') }}">Add a toilet!</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
