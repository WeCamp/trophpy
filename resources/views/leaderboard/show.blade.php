@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($users as $user)
                    <div class="panel panel-default">
                        <div class="panel-body @if($loop->index <3) bg-success @endif">
                            <div class="row">
                                <div class="col-md-1">{{$loop->index + 1}}</div>
                                <div class="col-md-9">{{ $user['name'] }}</div>
                                <div class="col-md-2">
                                    <div class="pull-right">@random <i class="fa fa-trophy" aria-hidden="true"></i></div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
