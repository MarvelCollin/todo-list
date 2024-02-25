@extends('components.main-layout')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@section('title', 'Profile Update')

@section('content')
    <div class="profile-outer">
        <div class="profile-container">
            <form method="POST" class="form" action="{{ route('profileUpdate', ['id' => $user->id]) }}"
                enctype="multipart/form-data">
                {{-- enctype="multipart/form-data" -> digunakan kalau mau upload image menggunakan form --}}
                @csrf
                <p>Update Profile</p>
                <div class="profile-items images">
                    <img src="{{ asset('storage/images/' . auth()->user()->profile_picture) }}" alt="asd">
                    <input  class="file" name="profile_picture" type="file" value="{{ $user->profile_picture }}">
                </div>
                <div class="profile-items">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" value="{{ $user->username }}">
                </div>
                <div class="profile-items">
                    <label for="oldpassword">Old Password</label>
                    <input id="password" name="password" type="password" placeholder="Old Password">
                </div>
                <div class="profile-items">
                    <label for="newpassword">New Password</label>
                    <input id="newpassword" name="newpassword" type="password" placeholder="New Password">
                </div>
                <div class="profile-items">
                    <label for="confirmpassword">Confirm Password</label>
                    <input id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm Password">
                </div>
                <div class="submit-button">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
