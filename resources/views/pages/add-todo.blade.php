@extends('components.main-layout')

@section('title', 'add')
<link rel="stylesheet" href="{{ asset('css/add-todo.css') }}">

@section('content')
    <div class="form-container">
        <form class="form" method="POST" action="{{ route('add') }}">
            @csrf
            <div class="header">
                <p>Create To-Do List !</p>
            </div>
            <div class="input-field">
                <label for="title">Title</label>
                <input id="title" type="text" name="title" placeholder="Your task title">
            </div>
            <div class="input-field">
                <label for="description">Description</label>
                <input id="description" type="text" name="description" placeholder="Your task description">
            </div>
            <div class="input-field">
                <label for="dob">Deadline</label>
                <input id="dob" type="date" name="deadline" placeholder="Your task title">
            </div>
            <div class="submit-button">
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection