@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($challenges as $challenge)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ $challenge->title }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
