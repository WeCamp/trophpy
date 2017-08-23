@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <!-- PANEL START -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4">
                            <img class="img-circle" width="300" src="{!!  asset('/img/user_avatar.png') !!}" alt="...">
                        </div>
                    </div>
                   <h1 class="text-center">{{$user['name']}}</h1>
                    <h3 class="text-center">{{ "@".$user['username'] }}</h3>
                </div>
            </div>
            <!-- PANEL END -->
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <!-- PANEL START -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-lg fa-info-circle"></i> Bio
                </div>
                <div class="panel-body">
                    YOUR BIO GOES HERE!
                </div>
            </div>
            <!-- PANEL END -->
        </div>
    </div>

@endsection