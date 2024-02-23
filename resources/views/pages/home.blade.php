@extends('components.main-layout')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@section('title', 'Home')

@section('content')
    <div class="data-container">
        <div class="task-container">
            <div class="header">
                <p>TASKS</p>
                <a class="action" href="{{ route('viewAdd') }}">+</a>
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
                            <th>
                                @if ($task->status == 0)
                                    <p class="incomplete">Incomplete</p>
                                @else
                                    <p class="complete">Complete</p>
                                @endif
                            </th>
                            <th>{{ $task->deadline }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
