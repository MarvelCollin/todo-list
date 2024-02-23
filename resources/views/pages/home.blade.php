@extends('components.main-layout')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@section('title', 'Home')

@section('content')
    <div class="data-container">
        <div class="task-container">
            <div class="header">
                <p>TASKS</p>
            </div>
            <table>
                <thead>
                    <tr class="task-top-title">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Deadline</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr class="data-items">
                        <th>{{ $task->id }}</th>
                        <th>{{ $task->title }}</th>
                        <th>{{ $task->description }}</th>
                        <th>{{ $task->status }}</th>
                        <th>{{ $task->deadline }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
