@extends('layouts.app')

@section('styles')
<style>
.planned td { color:gray !important; }    
.started td { color:green !important; }
.completed td { color:rgb(5, 5, 5) !important; }    
.failed td { color:red !important; }
.abandoned td { text-decoration: line-through; }
</style>
@endsection

@section('content')
@php
    $opts = [
        "rowreorder"=>["sort_order",route('tasks.updateOrder')],
        "imp"=>[0,1,2,3,4,5,6,7,8,9,10],
        "add"=>"addTask",
        "edit"=>"editTask",
        "delete"=>"delTask",
    ];
    $tbldata = [
        [ 'th'=>'Project', 'data'=>'project_id', 'name'=>'project_id' ], 
        [ 'data'=>'title' ], 
        [ 'data'=>'...description' ], 
        [ 'th'=>'User', 'data'=>'user_id', 'name'=>'user_id' ], 
        [ 'data'=>'*status','className'=>'text-center' ], 
        [ 'data'=>'start_date','className'=>'text-center'  ], 
        [ 'data'=>'end_date','className'=>'text-center'  ], 
        [ 'data'=>'target_hour','className'=>'text-center'  ], 
        [ 'data'=>'used_hour','className'=>'text-center'  ], 
        [ 'data'=>'created_at','className'=>'text-center' ], 
        [ 'data'=>'sort_order','visible'=>false ], 
    ];
@endphp
<x-table name="taskTable" title="Tasks" :url="route('tasks.getall')" :data=$tbldata :opts=$opts />


<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="taskForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="taskModalLabel">Add Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row gy-2">
            <input type="hidden" id="id" name="id" />
            <x-mselect icon="clipboard-data" name="project_id" title="Project" 
                :url="route('projects.withhrUsr')" multiple=false change="changeProj" />
            <x-text icon="laptop" name="title" title="Title" required=true />
            <x-richtext name="description" title="Description" />
            <x-mselect icon="person" name="user_id" title="User" 
                :url="route('users.withhr')" multiple=false onload="getProjId" />
            <x-number icon="alarm" name="target_hour" title="Target Hour" required=true />
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection

@section('scripts')
<script>

function changeProj(pid) {
    //setSelect2("user_id");
}

function setSelect2(nm,vls="") {
    console.log(nm,vls);
    let $select = $('#'+nm);
    $select.val(null).trigger('change');
    $select.select2('open'); 
    $select.select2('close');
    if(vls) {
        setTimeout(() => {
            let ids = [];
            $(`#${nm} li`).each(function () {
                ids.push($(this).attr('data-select2-id'));
            });
            console.log(ids);
            $select.val(vls).trigger('change');
        }, 1000);
    }
}

function getProjId() {
    let pid = $('#project_id').val();
    return pid ? { pid: pid } : {};
}

$(document).ready(function () {
    $("#taskForm").validate({
        rules: {
            project_id: {
                required: true,
            },
            title: {
                required: true,
                minlength: 3,
                maxlength: 200
            },
            description: {
                maxlength: 1000
            },
            user_id: {
                required: true,
            },
            target_hour: {
                required: true,
                number: true,
                min: 0,
            }
        },
        messages: {
            project_id: {
                required: "Project selection is required",
            },
            title: {
                required: "Task title is required",
                minlength: "Task title mininum required length is 3",
                maxlength: "Task title cannot exceed 200 characters",
            },
            description: {
                maxlength: "Description cannot exceed 1000 characters"
            },
            user_id: {
                required: "User selection is required",
            },
            target_hour: {
                required: "Task target hour is required",
                number: "Task target hour must be number",
                min: "Task target hour must be positive",
            },
        }
    });

    $('#taskForm').on('submit', function (e) {
        e.preventDefault();
        if (!$(this).valid()) return; 
        let id =$('#id').val();
        webserv("POST", id ? `tasks/${id}` : `tasks/add`, "taskForm", function ok(d) {
            toastr.success(d["msg"]);
            $('#taskModal').modal('hide');
            $('#taskTable').DataTable().ajax.reload();
        });
    });

});

function addTask() {
    $('#taskForm')[0].reset();
    $('#id').val(''); 
    setSelect2("project_id");
    setSelect2("user_id");
    $('#description').summernote('code', "");
    $('#taskModalLabel').text("Add Task");
    $('.error').text('');
    $('#taskModal').modal('show');
}

function editTask(id) {
    webserv("GET",`tasks/${id}`, {}, function (d) {
        // console.log(d["data"]);
        let data = d["data"];
        setSelect2("project_id", data.project_id);
        setSelect2("user_id", data.user_id);
        $('#id').val(data.id);
        $('#title').val(data.title);
        $('#description').summernote('code', data.description ?? "");
        $('#target_hour').val(data.target_hour);
        $('#taskModalLabel').text('Edit Task');
        $('#taskModal').modal('show');
    });    
}

function delTask(id) {
    myAlert("Are you sure you want to delete this Task ?","primary","Yes", function() {
        webserv("DELETE", `tasks/${id}`, {}, function (d) {
            toastr.success(d["msg"]);
            $('#taskTable').DataTable().ajax.reload();
        });        
    },"No");
}

</script>
@endsection
