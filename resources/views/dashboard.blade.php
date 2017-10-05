@extends('layouts.app')

@section('content')


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="{{ url('toilets') }}" class="db btn-primary">
                          View my toilets
                        </a>

                        <a href="{{ url('toilets/create') }}" class="db btn-primary">
                          Add a toilet!
                        </a>
                </div>

@endsection
