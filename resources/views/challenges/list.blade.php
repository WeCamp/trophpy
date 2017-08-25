@extends('layouts.app')

@section('content')
    @include ('partials.challenges._list', ['showStartChallenge' => true])
@endsection