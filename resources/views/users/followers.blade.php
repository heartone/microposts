@extends('layouts.app')

@section('content')
    <div class="row">
        @include('commons.user_profile', ['user' => $user])
        <div class="col-xs-12 col-sm-7 col-md-8">
            @include('users.users', ['users' => $users])
        </div>
    </div>
@endsection