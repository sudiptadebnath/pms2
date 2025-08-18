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
                <div class="mb-2">
                    <strong>Tasks:</strong>
                    <?php if(!empty($itm['tasks'])): ?>
                        <ul class="list-group list-group-flush small">
                            <?php $__currentLoopData = $itm['tasks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tsk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-2 py-1">
                                    <span><?php echo e($tsk['title'] ?? 'Untitled Task'); ?></span>
                                    <span class="badge bg-<?php echo e(($tsk['status'] ?? '') === 'done' ? 'success' : 'secondary'); ?>">
                                        <?php echo e(ucfirst($tsk['status'] ?? 'pending')); ?>

                                    </span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php else: ?>
                        <em>No tasks added</em>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH D:\wamp64\www\pms2\resources\views/components/projects.blade.php ENDPATH**/ ?>