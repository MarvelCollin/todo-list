@extends('components.app')

<link rel="stylesheet" href="{{ asset('css/main-layout.css') }}">

@section('main')
    <div class="container-field">
        <div class="nav">
            <div class="nav-items">
                <a href=""><img class="logo" src="{{ asset('assets/github-logo.png') }}" alt=""></a>
                <a class="active" href="#">TODO</a>
                <a class="" href="#">ABOUT</a>
            </div>
            <div class="nav-items">
                @auth
                    <div class="profile center">
                        <a href="#"><img class="profile-logo"
                                src="{{ asset('assets/profile/' . auth()->user()->profile_picture) }}" alt=""></a>
                        <a href="#">{{ auth()->user()->username }}</a>
                    </div>
                    <form class="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="logout-button center">Logout</button>
                    </form>
                @else
                    <a class="" href="{{ route('authviewer') }}">SIGN UP</a>
                @endauth
            </div>
        </div>
        <div class="content-container">
            @yield('content')
        </div>
    </div>
@endsection
