@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- PANEL START -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-pencil"></i> Edit
                    </button>
                    <div class="col-sm-4 col-sm-offset-4">

                        @if(!empty($user['avatar_filename']))
                            <img class="img-circle" width="100%" src="{!!  asset('img/avatars/'.$user['avatar_filename']) !!}" alt="...">
                        @else
                            <img class="img-circle" width="100%" src="{!!  asset('img/user_avatar.png') !!}" alt="...">
                        @endif
                    </div>
                </div>
               <h1 class="text-center">{{$user['name']}}</h1>
                <h3 class="text-center">{{ "@".$user['username'] }}</h3>
            </div>
        </div>
        <!-- PANEL END -->
    </div>
    
    <div class="row">
        <!-- PANEL START -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-lg fa-info-circle"></i> Bio
            </div>
            <div class="panel-body">
                @if(empty($user['bio']))
                    this user doesn't have a bio yet
                @else
                    {{$user['bio']}}
                @endif
            </div>
        </div>
        <!-- PANEL END -->
    </div>

    @include('users.edit')
@endsection