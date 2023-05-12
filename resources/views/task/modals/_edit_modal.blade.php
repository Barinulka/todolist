<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Редактирование задачи {{$task->name}}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="edit-task" action="{{ route('task.save', ['id' => $task->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <img id="saved-img" src="{{ asset('storage/assets/images/' . $task->img) }}" alt="{{ $task->name }}" width="150" height="150" >
            <br>
            <label for="recipient-image" class="col-form-label">Изображение:</label>
            <input type="file" class="form-control" name="image" id="image" >
            <input type="hidden" name="loadimage" id="loadimage" value="{{ $task->img }}">
            <input type="hidden" name="isdelete" id="isdelete" value="0">
            <br>
            <div class="form-group form-check">
                <input type="checkbox" name="delete" id="delete-image" class="form-check-input">
                <label for="delete-image" class="form-check-label">Удалить изображение</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="name" class="col-form-label">Название:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$task->name}}">
        </div>
        <div class="mb-3">
            <label for="description" class="col-form-label">Описание:</label>
            <textarea class="form-control" name="description" id="description">{{$task->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="name" class="col-form-label">Теги:</label>
            <small class="small-notice">Введите теги через запятую</small>
            <input type="text" class="form-control" name="tags" id="tags" value="">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="save-edit" value="add">Сохранить</button>
        </div>
    </form>
</div>
       