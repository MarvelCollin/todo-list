@extends('components.app')

<link rel="stylesheet" href="{{ asset('css/main-layout.css') }}">

@section('main')
    <div class="nav">
        <div class="nav-items">
            <a href=""><img class="logo" src="{{ asset('assets/github-logo.png') }}" alt=""></a>
            <a class="active" href="#">TODO</a>
            <a class="" href="#">ABOUT</a>
        </div>
        <div class="nav-items">
            @auth
            <div class="profile center">
                <a href="#"><img class="profile-logo" src="{{ asset('assets/profile/' . auth()->user()->profile_picture) }}" alt=""></a>
                <a href="#">{{ auth()->user()->username }}</a>
            </div>
            @else
            <a class="" href="">SIGN UP</a>
            @endauth
        </div>
    </div>
    @yield('content')
@endsection
    