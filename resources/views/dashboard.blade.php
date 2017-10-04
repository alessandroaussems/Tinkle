@extends('layouts.app')

@section('content')
<div class="container">


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
@endsection
