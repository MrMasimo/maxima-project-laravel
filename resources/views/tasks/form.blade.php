<form action="{{ empty($task) ? route('tasks.store') : route('tasks.update', $task) }}" method="POST">
    @csrf
    @if (!empty($task))
        @method('PUT')
    @endif
    <p><input type="text" name="title" value="{{ $task->title ?? '' }}" placeholder="Название"></p>
    <p>
        <label for="deadline">Дэдлайн</label>
        <input type="datetime-local" name="deadline" id="deadline"
            value="{{ $task ? substr($task->deadline, 0, 16) : '' }}">
    </p>
    <p>
        <textarea name="description" rows="5" cols="30" placeholder="Описание">{{ $task->description ?? '' }}</textarea>
    </p>
    <p><button type="submit">{{ empty($task) ? 'Создать' : 'Обновить' }}</button></p>
</form>
