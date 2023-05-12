$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('submit', '#new_task_form', function(e) {
        e.preventDefault();

        var form = $(this);

        console.log('submit');

        form.ajaxSubmit({
            type: 'POST',
            success: function(data) {
                $('#addNewTaskModal [data-bs-dismiss="modal"]').trigger({type: "click"});
                updateTaskList()
            },
            error: function(data) {
                console.log(data)
            }
        })
    })

    $(document).on('submit', '#filter-form', function(e) {
        e.preventDefault();

        var form = $(this);

        console.log('submit');

        form.ajaxSubmit({
            type:'post',
            success: function(data) {
                updateTaskList()
            },
            error: function(data) {
                console.log('asdasd')
            }
        })
    })

    $(document).on('submit', '#edit-task', function(e) {
        e.preventDefault();

        var form = $(this);

        console.log('submit');

        form.ajaxSubmit({
            type: 'POST',
            success: function(data) {
                $('#editTaskModal [data-bs-dismiss="modal"]').trigger({type: "click"});
                updateTaskList()
            },
            error: function(data) {
                console.log(data)
            }
        })
    })

    $(document).on('click', '.btn-delete-item', function(e){
        e.preventDefault();
        
        var btn = $(this);

        if (confirm('Вы уверени, что хотите удалить эту задачу?')) {

            var action = btn.attr('data-action');

            $.ajax({
                type: 'POST',
                url: action,
                data: '',
                dataType: 'json',
                success: function(data) {
                    updateTaskList()
                },
                error: function(data) {
                    console.log(data)
                }
            })
        }
    })

    $(document).on('click', '#delete-image', function(e){
        if ($(this).is(':checked')){
            $('#isdelete').val(1);
            $('#image').attr('disabled', true).val('');
            $('#saved-img').hide();
            console.log($('#image').val())
        } else {
            $('#isdelete').val(0);
            $('#image').attr('disabled', false);
            $('#saved-img').show();
        }
    })

    // $(document).on('click', '.add_task', function(){
    // // $(document).on('click', '.btn-edit-modal, .add_task', function(){
    //     var btn = $(this);
   
    //     var id = btn.attr('data-bs-id');
    //     var name = btn.attr('data-bs-name');
    //     var desc = btn.attr('data-bs-desc');
    //     var action = btn.attr('data-action');
    //     var image = btn.attr('data-bs-image');
    
    //     var form = $('#new_task_form');

    //     if (btn.hasClass('add_task')) {
    //         $('.modal-title').html('Добавление новой задачи');
    //         $('#btn-save').html('Добавить')
    //     } else {
    //         $('.modal-title').html('Редование задачи ' + name);
    //         $('#btn-save').html('Сохранить')
    //     }   
    
    //     fillForm(form, action, id, name, desc, image)
        
    // })

    $(document).on('click', '.btn-edit-modal', function(e){
        e.preventDefault();
       
        var btn = $(this);
        var href = btn.attr('data-bs-href');

        $.ajax({
            url: href,
            success: function(response){
                var content = $(response);
                $('#editTaskModal .modal-content').html(content).removeClass('hide');
            },
            error: function(response) {
                alert('error');
                $('#editTaskModal [data-bs-dismiss="modal"]').trigger({type: "click"});
            } 
        })

    })

})

function updateTaskList() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'get',
        url: _URL,
        success: function(data) {
            $('.tasks_list').html(data)
        },
        error: function(data) {
            console.log(data)
        }
    })
}



// function fillForm(form, action, id = '', name = '', desc = '', image = '') {

//     form[0].reset();

//     console.log(name)

//     form.attr('action', action);
//     form.find('input#recipient-name').val(name);
//     form.find('textarea#message-text').val(desc);
//     form.find('input#recipient-image').val(image);
// }
