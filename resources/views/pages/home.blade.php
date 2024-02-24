@extends('components.main-layout')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@section('title', 'Home')

@section('content')
    <div class="data-container">
        @auth
        <div class="task-container">
            <div class="header">
                <p></p>
                <p>TASKS</p>
                <a class="action" href="{{ route('viewAdd') }}">+</a>
            </div>
            <table>
                <thead>
                    <tr class="task-top-title">
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Deadline</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp
                    @foreach ($tasks as $task)
                        <tr class="data-items">
                            <th>{{ $no++ }}</th>
                            <th class="checker" data-status="{{ $task->status }}">{{ $task->title }}</th>
                            <th class="checker" data-status="{{ $task->status }}">{{ $task->description }}</th>
                            <th>
                                @if ($task->status == 0)
                                    <p class="incomplete">Incomplete</p>
                                @else
                                    <p class="complete">Complete</p>
                                @endif
                            </th>
                            <th class="checker" data-status="{{ $task->status }}">{{ $task->deadline }}</th>
                            <th class="action-section">
                                <div class="action-icon">
                                    <a href="{{ route('viewUpdate', ['id' => $task->id]) }}">
                                        <img src="{{ asset('assets/edit.png') }}" alt="">
                                    </a>
                                    <form method="POST" action="{{ route('delete-task', ['id' => $task->id]) }}"
                                        class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <img src="{{ asset('assets/trash.png') }}" alt="">
                                        </button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endauth
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkers = document.getElementsByClassName('checker');

            for (let i = 0; i < checkers.length; i++) {
                const checker = checkers[i];
                const status = checker.getAttribute('data-status');
                if (status == 1) {
                    checker.classList.add('cross');
                }
            }
        });
    </script>
@endsection
