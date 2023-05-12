<div class="col" id="task_{{$task->id}}">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <a href="{{ asset('storage/assets/images/' . $task->img) }}" target="_blank" class="image-link">
                <img class="bd-placeholder-img text-center" width="150" height="150" src="{{ asset('storage/assets/images/' . $task->img) }}" alt="empty">
            </a>
        </div>
        <div class="card-body">
            <h4>{{ $task->name }}</h4>
            <p class="card-text">{{ $task->description }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-sm btn-outline-secondary btn-edit-modal" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editTaskModal" 
                    data-bs-id="{{ $task->id }}" 
                    data-bs-name="{{ $task->name }}" 
                    data-bs-desc="{{ $task->description }}" 
                    data-action="{{ route('task.save', ['id' => $task->id]) }}" 
                    data-bs-image="{{ asset('assets/images/' . $task->img) }}"
                    data-bs-href="{{ route('task.edit', ['id' => $task->id]) }}"
                >
                    Редактировать
                </button>

                <button type="button" class="btn btn-sm btn-outline-danger btn-delete-item" 
                    data-action="{{ route('task.delete', ['id' => $task->id]) }}"
                >
                    Удалить
                </button>
            </div>

            <small class="small-notice">{{$task->tags->map(fn($item) => $item->name)->implode(", ")}}</small>   
            
        </div>
    </div>
</div>