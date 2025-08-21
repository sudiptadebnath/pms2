<?php
$jobsP = $jobs->where('status', 'p');
$jobsS = $jobs->where('status', 's');
$jobsC = $jobs->whereNotIn('status', ['p', 's']);
?>

<?php $__env->startSection('styles'); ?>
<style>
.row > [class*='col-'] {
    border-right: 1px dashed #e8e8e8; /* color and thickness */
}

/* Remove border on last column in the row */
.row > [class*='col-']:last-child {
    border-right: none;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mb-3">
    <div class="d-flex flex-wrap gap-2 justify-content-between border-1 border-bottom pb-2">
        <h3 class="col-md-1">Jobs</h3> 
        <?php if (isset($component)) { $__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mselect','data' => ['size' => '5','icon' => '','name' => 'project_id','title' => 'Project','url' => route('projects.withhrUsr'),'multiple' => 'false','change' => 'filterCards']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mselect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '5','icon' => '','name' => 'project_id','title' => 'Project','url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('projects.withhrUsr')),'multiple' => 'false','change' => 'filterCards']); ?>
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
        <?php if(hasRole("sam")): ?> 
        <?php if (isset($component)) { $__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mselect','data' => ['size' => '5','icon' => '','name' => 'user_id','title' => 'User','url' => route('users.withhr'),'multiple' => 'false','change' => 'filterCards','onload' => 'getProjId']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mselect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '5','icon' => '','name' => 'user_id','title' => 'User','url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('users.withhr')),'multiple' => 'false','change' => 'filterCards','onload' => 'getProjId']); ?>
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
        <?php endif; ?>
    </div>
</div>
<div class="container">
<div class="row">
    <?php if (isset($component)) { $__componentOriginal07d555aaec4517a1fb1f70d8cef5a230 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.jobs','data' => ['size' => '4','title' => 'Pending','data' => $jobsP]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('jobs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '4','title' => 'Pending','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($jobsP)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230)): ?>
<?php $attributes = $__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230; ?>
<?php unset($__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal07d555aaec4517a1fb1f70d8cef5a230)): ?>
<?php $component = $__componentOriginal07d555aaec4517a1fb1f70d8cef5a230; ?>
<?php unset($__componentOriginal07d555aaec4517a1fb1f70d8cef5a230); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal07d555aaec4517a1fb1f70d8cef5a230 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.jobs','data' => ['size' => '4','title' => 'In Progress','data' => $jobsS]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('jobs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '4','title' => 'In Progress','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($jobsS)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230)): ?>
<?php $attributes = $__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230; ?>
<?php unset($__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal07d555aaec4517a1fb1f70d8cef5a230)): ?>
<?php $component = $__componentOriginal07d555aaec4517a1fb1f70d8cef5a230; ?>
<?php unset($__componentOriginal07d555aaec4517a1fb1f70d8cef5a230); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal07d555aaec4517a1fb1f70d8cef5a230 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.jobs','data' => ['size' => '4','title' => 'Completed','data' => $jobsC]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('jobs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '4','title' => 'Completed','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($jobsC)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230)): ?>
<?php $attributes = $__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230; ?>
<?php unset($__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal07d555aaec4517a1fb1f70d8cef5a230)): ?>
<?php $component = $__componentOriginal07d555aaec4517a1fb1f70d8cef5a230; ?>
<?php unset($__componentOriginal07d555aaec4517a1fb1f70d8cef5a230); ?>
<?php endif; ?>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
<script>

function getProjId() {
    let pid = $('#project_id').val();
    return pid ? { pid: pid } : {};
}

function filterCards() {
    let proj = $('[name="project_id"]').val();
    let user = $('[name="user_id"]').val();

    $(".card").hide().filter(function () {
        let matchProj = !proj || $(this).hasClass("proj-" + proj);
        let matchUser = !user || $(this).hasClass("uid-" + user);
        return matchProj && matchUser;
    }).show();
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\wamp64\www\pms2\resources\views/user/jobs.blade.php ENDPATH**/ ?>