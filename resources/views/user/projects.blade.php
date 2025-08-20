@extends('layouts.app')
@section('styles')
<style>

.planned td { color:black !important; }    
.completed td { color:gray !important; }    
.active td { color:green !important; }

</style>
@endsection
@section('content')

@php
    $opts = [
        "imp"=>[0,1,2,3,4,5],
        "add"=>"addProject",
        "edit"=>"editProject",
        "delete"=>"delProject",
    ];
    $tbldata = [
        [ 'data'=>'name',  ], 
        [ 'data'=>'...description', ], 
        [ 'data'=>'users', ], 
        [ 'data'=>'*status','className'=>'text-center', ], 
        [ 'data'=>'start_date','className'=>'text-center', ], 
        [ 'data'=>'end_date','className'=>'text-center', ], 
        [ 'data'=>'created_at','className'=>'text-center', ], 
    ];
@endphp
<x-table name="projectTable" title="Projects" :url="route('projects.getall')" :data=$tbldata :opts=$opts />

<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="projectForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="projectModalLabel">Add Project</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row gy-2">
            <input type="hidden" id="id" name="id" />
            <x-text icon="clipboard-data" name="name" title="Project Name" required=true />
            <x-select icon="check" name="status" title="status" :value="projStatDict()" />
            <x-datetime size="6" name="start_date" title="Start Date" required=false />
            <x-datetime size="6" name="end_date" title="End Date" required=false />
            <x-richtext name="description" title="Description" required=true />
            <x-mselect icon="people" name="users" title="users" :url="route('users.withhr')" />
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

$(document).ready(function () {
    $("#projectForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 200
            },
            description: {
                maxlength: 1000
            },
            start_date: {
                required: true,
                mydate: true
            },
            end_date: {
                required: true,
                mydate: true,
                greaterThanDate: "#start_date"
            },
            status: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Project name is required",
                minlength: "Project name must be at least 3 characters",
                maxlength: "Project name cannot exceed 200 characters"
            },
            description: {
                maxlength: "Description cannot exceed 1000 characters"
            },
            start_date: {
                required: "Start date is required",
                mydate: "Please enter a valid start date"
            },
            end_date: {
                required: "End date is required",
                mydate: "Please enter a valid end date",
                greaterThanDate: "End date must be after or equal to start date"
            },
            status: {
                required: "Please select a status"
            }
        }
    });

    $('#projectForm').on('submit', function (e) {
        e.preventDefault();
        if (!$(this).valid()) return; 
        let id =$('#id').val();
        webserv("POST", id ? `projects/${id}` : `projects/add`, "projectForm", function ok(d) {
            toastr.success(d["msg"]);
            $('#projectModal').modal('hide');
            $('#projectTable').DataTable().ajax.reload();
        });
    });

});

function addProject() {
    $('#projectForm')[0].reset();
    $('#id').val(''); 
    $('#description').summernote('code', "");
    $('#users').val(null).trigger('change');
    $('#projectModalLabel').text("Add Project");
    $('.error').text('');
    $('#projectModal').modal('show');
}

function editProject(id) {
    webserv("GET",`projects/${id}`, {}, function (d) {
        let data = d["data"];
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#description').summernote('code', data.description ?? "");
        $('#status').val(data.status);
        $('#start_date').val(data.start_date);
        $('#end_date').val(data.end_date);
        $('#users').val(data.users).trigger('change');
        $('#projectModalLabel').text('Edit Project');
        $('#projectModal').modal('show');
    });    
}

function delProject(id) {
    myAlert("Are you sure you want to delete this project ?","primary","Yes", function() {
        webserv("DELETE", `projects/${id}`, {}, function (d) {
            toastr.success(d["msg"]);
            $('#projectTable').DataTable().ajax.reload();
        });        
    },"No");
}

</script>
@endsection
