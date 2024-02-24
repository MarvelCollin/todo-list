@extends('components.main-layout')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@section('title', 'Profile Update')

@section('content')
    <div class="profile-outer">
        <div class="profile-container">
            <form method="POST" class="form" action="{{ route('profileUpdate', ['id'=>$user->id]) }}">
                @csrf
                <p>Update Profile</p>
                <div class="profile-items">
                    <img src="{{ asset('assets/profile/' . $user->profile_picture) }}" alt="">
                </div>
                <div class="profile-items">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" value="{{ $user->username }}">
                </div>
                <div class="profile-items">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Your Password">
                </div>
                <div class="submit-button">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
