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

<?php if (! $__env->hasRenderedOnce('c96e5750-7f93-4e83-b4e2-abb93d8297f1')): $__env->markAsRenderedOnce('c96e5750-7f93-4e83-b4e2-abb93d8297f1'); ?>
<?php $__env->startPush('styles'); ?>
<style>
.card.cls-p { background-color:#fbfbfb !important;  }
.card.cls-s { background-color: rgb(244,255,244) !important;  }
.card.cls-c .text-status { color:green !important;  }
.card.cls-f .text-status { color:red !important;  }
.card.cls-a .text-status,.card.cls-a * { text-decoration: line-through;  }
</style>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<div class="col-md-<?php echo e($size); ?>">
    <h5 class="d-flex border-1 border-bottom pb-2">
        <?php echo e($title); ?>

    </h5>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card w-100 mb-2 proj-<?php echo e($job->project->id); ?> uid-<?php echo e($job->user_id); ?>">
    <div class="card-body p-2 cls-<?php echo e($job['status']); ?>">
        <span class="badge bg-info text-white position-absolute top-0 end-0 m-0 p-1">
            <?php echo e(number_format($job->used_hour1 ?? 0, 1)); ?> / 
            <?php echo e(number_format($job->target_hour ?? 0, 1)); ?> H
        </span>
        <span class="badge bg-secondary text-white position-absolute start-50"
            style="top: 0; transform: translate(-50%, -30%);">
            <?php echo e($job->user->uid ?? "-"); ?>

        </span>
        <div class="d-flex align-items-center flex-wrap">
            <strong class="me-2"><?php echo e($job["title"]); ?></strong> :&nbsp;
            <small class="text-muted"><?php echo e($job->project->name); ?></small>
        </div>
        <div class="mb-2 text-wrap bigtxt">
            <?php echo e($job["description"]); ?>

        </div>
        <div class="d-flex justify-content-between flex-wrap">
        <button type="button" class="btn btn-link text-primary px-1" title="Comments"
        onclick="showComment('Comments',<?php echo e($job->project->id); ?>,<?php echo e($job->id); ?>,<?php echo e($job->user->id); ?>)">
            <i class="bi bi-chat-dots"></i>
        </button>
        <div>
    <?php switch($job["status"]):

        case ("p" /*PENDING*/ ): ?> 
        <button class="btn btn-sm btn-primary" onclick="setTaskStat(<?php echo e($job['id']); ?>,'s')">Start</button>
        <?php break; ?>

        <?php case ("s" /*STARTED*/ ): ?> 
        <button class="btn btn-sm btn-primary" onclick="setTaskStat(<?php echo e($job['id']); ?>,'p')">Stop</button>
        <button class="btn btn-sm btn-primary" onclick="setTaskStat(<?php echo e($job['id']); ?>,'c')">Completed</button>
        <button class="btn btn-sm btn-primary" onclick="setTaskStat(<?php echo e($job['id']); ?>,'f')">Failed</button>
        <button class="btn btn-sm btn-primary" onclick="setTaskStat(<?php echo e($job['id']); ?>,'a')">Abandoned</button>
        <?php break; ?>

        <?php case ("c" /*COMPLETED*/ ): ?> 
        <?php case ("f" /*FAILED*/ ): ?> 
        <?php case ("a" /*ABANDONED*/ ): ?> 
        <div class="text-status"><?php echo e(taskStatDict()[$job["status"]] ?? "-"); ?></div>
        <?php break; ?>

    <?php endswitch; ?>
        </div>
        </div>
    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<?php if (! $__env->hasRenderedOnce('7d45842a-ea7a-4b34-bc59-7081ede5b5f2')): $__env->markAsRenderedOnce('7d45842a-ea7a-4b34-bc59-7081ede5b5f2'); ?>
<?php $__env->startPush('scripts'); ?>
<script>
function setTaskStat(tid,stat) {
    webserv("POST",`jobs/${tid}`, { stat }, function (d) {
        window.location.reload();
    });  
}
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH D:\wamp64\www\pms2\resources\views/components/jobs.blade.php ENDPATH**/ ?>