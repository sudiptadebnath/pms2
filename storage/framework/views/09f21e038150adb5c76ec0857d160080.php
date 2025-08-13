<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'size' => 12,
    'title' => 'Jobs',
    'url' => "",
    'data' => [],
    'opts' => [],
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
    'size' => 12,
    'title' => 'Jobs',
    'url' => "",
    'data' => [],
    'opts' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<?php

/*
            "p" => "Pending",
            "s" => "Started",
            "c" => "Completed",
            "f" => "Failed",
            "a" => "Abandoned",
*/
?>

<?php if (! $__env->hasRenderedOnce('ba8da8c5-0ef6-42e7-ab2f-93493d5c5837')): $__env->markAsRenderedOnce('ba8da8c5-0ef6-42e7-ab2f-93493d5c5837'); ?>
<?php $__env->startPush('styles'); ?>
<style>
.cls-p { border-color:gray !important;  }
.cls-s { border-color:green !important;  }
.cls-c { border-color:black !important;  }
.cls-f { border-color:red !important;  }
.cls-a, .cls-a * { text-decoration: line-through;  }
</style>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<div class="col-md-<?php echo e($size); ?>">
    <h5 class="d-flex border-1 border-bottom pb-2">
        <?php echo e($title); ?>

    </h5>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card w-100">
    <div class="card-body cls-<?php echo e($job['status']); ?>">
        <h5 class="card-title"><?php echo e($job["title"]); ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo e($job->project->name); ?></h6>
        <p class="card-text"><?php echo e($job["description"]); ?></p>
    <?php switch($job["status"]):
        case ("p" /*PENDING*/ ): ?> 
        <button class="btn btn-sm btn-primary" onclick="setStat(<?php echo e($job['id']); ?>,'s')">Start</button>
        <?php break; ?>
        <?php case ("s" /*STARTED*/ ): ?> 
        <button class="btn btn-sm btn-primary" onclick="setStat(<?php echo e($job['id']); ?>,'s')">Start</button>
        <?php break; ?>
        <?php case ("c" /*COMPLETED*/ ): ?> 
        <button class="btn btn-sm btn-primary" onclick="setStat(<?php echo e($job['id']); ?>,'s')">Start</button>
        <?php break; ?>
        <?php case ("f" /*FAILED*/ ): ?> 
        <button class="btn btn-sm btn-primary" onclick="setStat(<?php echo e($job['id']); ?>,'s')">Start</button>
        <?php break; ?>
        <?php case ("a" /*ABANDONED*/ ): ?> 
        <button class="btn btn-sm btn-primary" onclick="setStat(<?php echo e($job['id']); ?>,'s')">Start</button>
        <?php break; ?>
    <?php endswitch; ?>
    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php /**PATH D:\wamp64\www\pms2\resources\views/components/jobs.blade.php ENDPATH**/ ?>