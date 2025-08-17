<?php $__env->startSection('styles'); ?>
<style>
.planned td { color:gray !important; }    
.started td { color:green !important; }
.completed td { color:rgb(5, 5, 5) !important; }    
.failed td { color:red !important; }
.abandoned td { text-decoration: line-through; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
    $opts = [
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
        [ 'data'=>'updated_at','className'=>'text-center' ], 
    ];
?>
<?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => ['name' => 'taskTable','title' => 'Tasks','url' => route('tasks.getall'),'data' => $tbldata,'opts' => $opts]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'taskTable','title' => 'Tasks','url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('tasks.getall')),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tbldata),'opts' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($opts)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>


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
            <?php if (isset($component)) { $__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mselect','data' => ['icon' => 'clipboard-data','name' => 'project_id','title' => 'Project','value' => $projects,'multiple' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mselect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'clipboard-data','name' => 'project_id','title' => 'Project','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($projects),'multiple' => 'false']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3)): ?>
<?php $attributes = $__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3; ?>
<?php unset($__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3)): ?>
<?php $component = $__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3; ?>
<?php unset($__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal722f54fa328c8aa4ec9129f4c623ee05 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text','data' => ['icon' => 'laptop','name' => 'title','title' => 'Title','required' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'laptop','name' => 'title','title' => 'Title','required' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05)): ?>
<?php $attributes = $__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05; ?>
<?php unset($__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal722f54fa328c8aa4ec9129f4c623ee05)): ?>
<?php $component = $__componentOriginal722f54fa328c8aa4ec9129f4c623ee05; ?>
<?php unset($__componentOriginal722f54fa328c8aa4ec9129f4c623ee05); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal4727f9fd7c3055c2cf9c658d89b16886 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.textarea','data' => ['icon' => 'journal-text','name' => 'description','title' => 'Description']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'journal-text','name' => 'description','title' => 'Description']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886)): ?>
<?php $attributes = $__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886; ?>
<?php unset($__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4727f9fd7c3055c2cf9c658d89b16886)): ?>
<?php $component = $__componentOriginal4727f9fd7c3055c2cf9c658d89b16886; ?>
<?php unset($__componentOriginal4727f9fd7c3055c2cf9c658d89b16886); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mselect','data' => ['icon' => 'person','name' => 'user_id','title' => 'User','value' => [],'multiple' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mselect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'person','name' => 'user_id','title' => 'User','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([]),'multiple' => 'false']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3)): ?>
<?php $attributes = $__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3; ?>
<?php unset($__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3)): ?>
<?php $component = $__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3; ?>
<?php unset($__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal93c2b280ccb6a285f041b751fa393e06 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal93c2b280ccb6a285f041b751fa393e06 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.number','data' => ['icon' => 'alarm','name' => 'target_hour','title' => 'Target Hour','required' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'alarm','name' => 'target_hour','title' => 'Target Hour','required' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal93c2b280ccb6a285f041b751fa393e06)): ?>
<?php $attributes = $__attributesOriginal93c2b280ccb6a285f041b751fa393e06; ?>
<?php unset($__attributesOriginal93c2b280ccb6a285f041b751fa393e06); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93c2b280ccb6a285f041b751fa393e06)): ?>
<?php $component = $__componentOriginal93c2b280ccb6a285f041b751fa393e06; ?>
<?php unset($__componentOriginal93c2b280ccb6a285f041b751fa393e06); ?>
<?php endif; ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

function loadUsers(pid,sel) {
    if (!pid) return;
    let $userSelect = $('#user_id');
    webserv("GET","projects/"+pid+"/users",{}, function (d) {
        $userSelect.empty(); 
        $userSelect.append('<option value="">Select User</option>');
        $.each(d["data"], function (i, user) {
            let option = new Option(user.uid, user.id, false, user.id == (typeof sel === 'undefined' ? '' : sel));
            $userSelect.append(option);
        });        
        $userSelect.trigger('change');
    });
}

$('#project_id').on('change', function () {
    loadUsers($(this).val());
});

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
    loadUsers($('#project_id').val());
    $('#users').val(null).trigger('change');
    $('#taskModalLabel').text("Add Task");
    $('.error').text('');
    $('#taskModal').modal('show');
}

function editTask(id) {
    webserv("GET",`tasks/${id}`, {}, function (d) {
        let data = d["data"];
        $('#project_id').val(data.project_id).trigger('change');
        $('#id').val(data.id);
        $('#title').val(data.title);
        $('#description').val(data.description);
        $('#target_hour').val(data.target_hour);
        loadUsers($('#project_id').val(),data.user_id);
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\pms2\resources\views/user/tasks.blade.php ENDPATH**/ ?>