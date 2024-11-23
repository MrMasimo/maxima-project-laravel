
@extends('layouts.app')

@section('content')
    <h1>Список задач</h1>
    @foreach ($tasks as $task)
        <div class="mb-4">
            <a href="/tasks/{{ $task->id }}">
                {{ $task->title }}
            </a>
        </div>
    @endforeach

    <button style="margin-top: 3em;"><a href="{{ route('tasks.create') }}">Создать задачу</a></button>
@endsection
