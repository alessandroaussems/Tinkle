@extends('layouts.app')
@section('content')
        <div class="content">

            @auth
            <!-- Page Content -->

                @else
            @endauth





            <div class="bg">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <a href="{{ url('/findatoilet') }}" role="button" class="btn btn-secondary btn-lg homeButton">Find me a toilet</a>
                  </div>
                </div>
              </div>
            </div>




        </div>
@endsection
