
<?php $__env->startSection('content'); ?>
<div class="container vw-100 mb-3">
    <h3 class="d-flex border-1 border-bottom pb-2">
        Jobs 
        <?php if (isset($component)) { $__componentOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal20bb1f77d056b8fba1ac560ae63e55c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mselect','data' => ['size' => '6','icon' => '','name' => 'project_id','title' => 'Choose Project','value' => $projects,'multiple' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mselect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '6','icon' => '','name' => 'project_id','title' => 'Choose Project','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($projects),'multiple' => 'false']); ?>
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
    </h3>
</div>
<div class="container">
<div class="row">
    <?php if (isset($component)) { $__componentOriginal07d555aaec4517a1fb1f70d8cef5a230 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal07d555aaec4517a1fb1f70d8cef5a230 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.jobs','data' => ['size' => '4','title' => 'Pending','data' => $jobs]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('jobs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '4','title' => 'Pending','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($jobs)]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.jobs','data' => ['size' => '4','title' => 'In Progress','data' => $jobs]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('jobs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '4','title' => 'In Progress','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($jobs)]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.jobs','data' => ['size' => '4','title' => 'Completed','data' => $jobs]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('jobs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '4','title' => 'Completed','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($jobs)]); ?>
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


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\wamp64\www\pms2\resources\views/user/jobs.blade.php ENDPATH**/ ?>