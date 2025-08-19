<?php $__env->startSection('content'); ?>

<div class="container vw-100 mb-3">
    <h5 class="d-flex border-1 border-bottom pb-2">Projects</h5>
    <?php if (isset($component)) { $__componentOriginal10b746ef96f4e0d8a7981993158a89b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal10b746ef96f4e0d8a7981993158a89b4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.projects','data' => ['data' => $projects]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('projects'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($projects)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal10b746ef96f4e0d8a7981993158a89b4)): ?>
<?php $attributes = $__attributesOriginal10b746ef96f4e0d8a7981993158a89b4; ?>
<?php unset($__attributesOriginal10b746ef96f4e0d8a7981993158a89b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10b746ef96f4e0d8a7981993158a89b4)): ?>
<?php $component = $__componentOriginal10b746ef96f4e0d8a7981993158a89b4; ?>
<?php unset($__componentOriginal10b746ef96f4e0d8a7981993158a89b4); ?>
<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\pms2\resources\views/user/dashboard.blade.php ENDPATH**/ ?>