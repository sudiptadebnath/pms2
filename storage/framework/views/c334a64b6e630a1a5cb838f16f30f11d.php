<?php $__env->startSection('styles'); ?>
<style>

.planned td { color:black !important; }    
.completed td { color:gray !important; }    
.active td { color:green !important; }

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php
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
?>
<?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => ['name' => 'projectTable','title' => 'Projects','url' => route('projects.getall'),'data' => $tbldata,'opts' => $opts]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'projectTable','title' => 'Projects','url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('projects.getall')),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tbldata),'opts' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($opts)]); ?>
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
            <?php if (isset($component)) { $__componentOriginal722f54fa328c8aa4ec9129f4c623ee05 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text','data' => ['icon' => 'clipboard-data','name' => 'name','title' => 'Project Name','required' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'clipboard-data','name' => 'name','title' => 'Project Name','required' => 'true']); ?>
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
            <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['icon' => 'check','name' => 'status','title' => 'status','value' => projStatDict()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'check','name' => 'status','title' => 'status','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(projStatDict())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal8319e42702f02703b9e1bc5b0dc5413c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8319e42702f02703b9e1bc5b0dc5413c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datetime','data' => ['size' => '6','name' => 'start_date','title' => 'Start Date','required' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('datetime'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '6','name' => 'start_date','title' => 'Start Date','required' => 'false']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8319e42702f02703b9e1bc5b0dc5413c)): ?>
<?php $attributes = $__attributesOriginal8319e42702f02703b9e1bc5b0dc5413c; ?>
<?php unset($__attributesOriginal8319e42702f02703b9e1bc5b0dc5413c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8319e42702f02703b9e1bc5b0dc5413c)): ?>
<?php $component = $__componentOriginal8319e42702f02703b9e1bc5b0dc5413c; ?>
<?php unset($__componentOriginal8319e42702f02703b9e1bc5b0dc5413c); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal8319e42702f02703b9e1bc5b0dc5413c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8319e42702f02703b9e1bc5b0dc5413c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datetime','data' => ['size' => '6','name' => 'end_date','title' => 'End Date','required' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('datetime'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '6','name' => 'end_date','title' => 'End Date','required' => 'false']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8319e42702f02703b9e1bc5b0dc5413c)): ?>
<?php $attributes = $__attributesOriginal8319e42702f02703b9e1bc5b0dc5413c; ?>
<?php unset($__attributesOriginal8319e42702f02703b9e1bc5b0dc5413c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8319e42702f02703b9e1bc5b0dc5413c)): ?>
<?php $component = $__componentOriginal8319e42702f02703b9e1bc5b0dc5413c; ?>
<?php unset($__componentOriginal8319e42702f02703b9e1bc5b0dc5413c); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginald87613734705359afcd897232a1c83ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald87613734705359afcd897232a1c83ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.richtext','data' => ['name' => 'description','title' => 'Description','required' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('richtext'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'description','title' => 'Description','required' => 'true']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mselect','data' => ['icon' => 'people','name' => 'users','title' => 'users','url' => route('users.withhr')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mselect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'people','name' => 'users','title' => 'users','url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('users.withhr'))]); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\wamp64\www\pms2\resources\views/user/projects.blade.php ENDPATH**/ ?>