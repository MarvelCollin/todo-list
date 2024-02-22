@extends('components.app')
<link rel="stylesheet" href="{{ asset('css/authentication.css') }}">

@section('title', 'Authentication')

@section('main')
  <div class="content-container">
    <div class="form-container">
        <div class="header-container">
            <button id="login-button" class="button-header" onclick="goLogin()">LOGIN</button>
            <button id="register-button" class="button-header unactive" onclick="goRegister()">REGISTER</button>
        </div>
        <div id="login-section" class="form-section">
            <form method="POST" action="{{ route('login') }}">
                @csrf 
                <div class="input-container">
                    <label for="username">Username</label>
                    <input class="input-field" id="username" type="text" name="username">
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input class="input-field" id="password" type="password" name="password">
                </div>
                <div class="input-container">
                    <button class="submit-button" type="submit">LOGIN</button>
                </div>
            </form>
        </div>
        <div id="register-section" class="form-section hidden">
            <form method="POST" action="{{ route('register') }}">
                @csrf 
                <div class="input-container">
                    <label for="username">Username</label>
                    <input class="input-field" id="username" type="text" name="username">
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input class="input-field" id="password" type="password" name="password">
                </div>
                <div class="input-container">
                    <label for="password">Password Confirmation</label>
                    <input class="input-field" id="password" type="password">
                </div>
                <div class="input-container">
                    <button class="submit-button" type="submit">REGISTER</button>
                </div>
            </form>
        </div>
    </div>
  </div>
  <script src="{{ asset('js/authentication.js') }}"></script>i
@endsection
