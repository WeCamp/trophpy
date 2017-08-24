@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- PANEL START -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        @if(!empty($user['avatar_filename']))
                            <img class="img-circle" width="100%" src="{!!  asset('img/'.$user['avatar_filename']) !!}" alt="...">
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
                {{$user['bio']}}
            </div>
        </div>
        <!-- PANEL END -->
    </div>

    <div class="row">
        <div class="panel-heading">
            <h3><i class="fa fa-lg fa-tasks"></i> Current Challenges</h3>
        </div>
        @include ('partials.challenges._list', ['challenges' => $currentChallenges, 'showStartedOn' => true])
    </div>
    <div class="row">
        <div class="panel-heading">
            <h3><i class="fa fa-lg fa-trophy"></i> Completed Challenges</h3>
        </div>
        @include ('partials.challenges._list', ['challenges' => $completedChallenges, 'showCompletedOn' => true])
    </div>



@endsection