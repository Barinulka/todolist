@foreach ($tasks as $task)
    @include('task._task_item', ['task' => $task])
@endforeach
