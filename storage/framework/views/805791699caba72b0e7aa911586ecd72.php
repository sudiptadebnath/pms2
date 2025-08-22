<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name' => 'projAcrd',
    'data' => [],
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'name' => 'projAcrd',
    'data' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="accordion" id="projAcrd">
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <?php
        $headingId = "heading{$itm['id']}";
        $collapseId = "collapse{$itm['id']}";
    ?>
    <div class="accordion-item">
        <h2 class="accordion-header" id="<?php echo e($headingId); ?>">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                data-bs-target="#<?php echo e($collapseId); ?>" aria-expanded="true" aria-controls="<?php echo e($collapseId); ?>">
                <?php echo e($itm['name']); ?>

            </button>
        </h2>
        <div id="<?php echo e($collapseId); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo e($headingId); ?>" data-bs-parent="#projAcrd">
            <div class="accordion-body">
                <?php echo $itm['description']; ?>

                <hr>
                <div class="mb-2">
                    <strong>Duration:</strong>
                    <?php echo e($itm['start_date'] ? \Carbon\Carbon::parse($itm['start_date'])->format('d M Y') : 'N/A'); ?>

                    –
                    <?php echo e($itm['end_date'] ? \Carbon\Carbon::parse($itm['end_date'])->format('d M Y') : 'N/A'); ?>

                </div>
                <div class="mb-2">
                    <strong>Members:</strong>
                    <?php if(!empty($itm['users'])): ?>
                        <?php $__currentLoopData = $itm['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge bg-primary me-1"><?php echo e($uid["uid"] ?? "-"); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <em>No members assigned</em>
                    <?php endif; ?>
                </div>
            <?php if(!empty($itm['tasks'])): ?>
                <?php
                    $opts = [
                        "rawdata"=>$itm['tasks']->map(function($t) {
                            return [
                                "title"=> $t->title,
                                "status"=> $t->status,
                                "user"=> $t->user->uid,
                            ];
                        }),
                    ];
                    $tbldata = [
                        [ 'data'=>'title' ], 
                        [ 'data'=>'user' ], 
                        [ 'data'=>'*status','className'=>'text-center' ], 
                    ];
                ?>
                <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => ['name' => 'jobs_'.e($itm['id']).'','title' => 'Tasks','data' => $tbldata,'opts' => $opts]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'jobs_'.e($itm['id']).'','title' => 'Tasks','data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tbldata),'opts' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($opts)]); ?>
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
            <?php endif; ?>                    
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH D:\wamp64\www\pms2\resources\views/components/projects.blade.php ENDPATH**/ ?>