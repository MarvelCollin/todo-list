@extends('components.main-layout')

@section('title', 'edit')
<link rel="stylesheet" href="{{ asset('css/add-todo.css') }}">

@section('content')
    <div class="form-container">
        <form class="form" method="POST" action="{{ route('update', ['id' => $tasks->id]) }}">
            @csrf
            <div class="header">
                <p>Edit To-Do List !</p>
            </div>
            <div class="input-field">
                <label for="title">Title</label>
                <input id="title" type="text" name="title" value="{{ $tasks->title }}">
            </div>
            <div class="input-field">
                <label for="description">Description</label>
                <input id="description" type="text" name="description" value="{{ $tasks->description }}">
            </div>
            <div class="input-field">
                <label for="dob">Deadline</label>
                <input id="dob" type="date" name="deadline" value="{{ $tasks->deadline }}">
            </div>
            <div class="input-field centering">
                <label for="checkbox">Complete ?</label>
                <input id="checkbox" type="checkbox" name="checkbox"  {{ $tasks->status == 1 ? 'checked' : '' }}>
            </div>

            <div class="submit-button">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection