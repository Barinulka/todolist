@extends('layouts.app')

@section('content')
    <section class="pb-5 text-center">
        <div class="row ">
            <div class="col-lg-6 col-md-8 mx-auto">
                {{-- <a href="#" class="btn btn-outline-primary btn-lg my-2 add_task" data-action="getNewTaskForm">Добавить задачу</a>               --}}
                <button type="button" class="btn btn-outline-primary tn-lg my-2 add_task " data-bs-toggle="modal" data-bs-target="#addNewTaskModal" data-action="{{ route('task.save') }}">
                    Добавить задачу
                </button>
            </div>
        </div>
    </section>

    @if (count($tasks) > 0)
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-3 tasks_list">
            @foreach ($tasks as $task)
                @include('task._task_item', ['task' => $task])
            @endforeach
        </div>
    @else
        <div class="py-5 text-center">
            <h2>Задач пока нет</h2>
        </div>
    @endif
    
@endsection

<!-- Modals -->
@section('modals')
    <div class="modal fade" id="addNewTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление новой задачи</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="new_task_form" action="{{ route('task.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-image" class="col-form-label">Изображение:</label>
                            <input type="file" class="form-control name="image" id="recipient-image">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Название:</label>
                            <input type="text" class="form-control" name="name" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="description-text" class="col-form-label">Описание:</label>
                            <textarea class="form-control" name="description" id="description-text"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="add">Добавить</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection