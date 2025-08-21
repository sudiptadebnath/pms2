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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mselect','data' => ['icon' => 'clipboard-data','name' => 'project_id','title' => 'Project','url' => route('projects.withhrUsr'),'multiple' => 'false','change' => 'changeProj']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mselect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'clipboard-data','name' => 'project_id','title' => 'Project','url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('projects.withhrUsr')),'multiple' => 'false','change' => 'changeProj']); ?>
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
            <?php if (isset($component)) { $__componentOriginald87613734705359afcd897232a1c83ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald87613734705359afcd897232a1c83ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.richtext','data' => ['name' => 'description','title' => 'Description']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('richtext'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'description','title' => 'Description']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald87613734705359afcd897232a1c83ee)): ?>
<?php $attributes = $__attributesOriginald87613734705359afcd897232a1c83ee; ?>
<?php unset($__attributesOriginald87613734705359afcd897232a1c83ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald87613734705359afcd897232a1c83ee)): ?>
<?php $component = $__componentOriginald87613734705359afcd897232a1c83ee; ?>
<?php unset($__componentOriginald87613734705359afcd897232a1c83ee); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mselect','data' => ['icon' => 'person','name' => 'user_id','title' => 'User','url' => route('users.withhr'),'multiple' => 'false','onload' => 'getProjId']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mselect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'person','name' => 'user_id','title' => 'User','url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('users.withhr')),'multiple' => 'false','onload' => 'getProjId']); ?>
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

function changeProj(pid) {
    setSelect2("user_id");
}

function setSelect2(nm,vls="",txt="") {
    let $el = $('#' + nm);
    if (!vls) {
        $el.val(null).trigger('change');
        return;
    }
    if ($el.find("option[value='" + vls + "']").length) {
        $el.val(vls).trigger('change');
    } else {
        let newOption = new Option(txt ?? vls, vls, true, true);
        $el.append(newOption).trigger('change');
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
            if(id) $('#taskModal').modal('hide');
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
        setSelect2("project_id", data.project_id, data.project.name);
        setSelect2("user_id", data.user_id, data.user.uid);
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\wamp64\www\pms2\resources\views/user/tasks.blade.php ENDPATH**/ ?>