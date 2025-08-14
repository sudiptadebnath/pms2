<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'size' => 12,
    'name' => 'sel',
    'title' => 'sel',
    'icon' => 'person',
    'value' => [],
    'multiple' => true,
    'change' => '',
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
    'name' => 'sel',
    'title' => 'sel',
    'icon' => 'person',
    'value' => [],
    'multiple' => true,
    'change' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<?php
    $multiple = filter_var($multiple, FILTER_VALIDATE_BOOLEAN);
?>
<div class="col-md-<?php echo e($size); ?>">
    <div class="input-group">
        <span class="input-group-text">
            <?php if(!empty($icon)): ?>
            <i class="bi bi-<?php echo e($icon); ?>"></i>
            <?php else: ?>
            <?php echo e(ucfirst($title)); ?>

            <?php endif; ?>
        </span>
        <select name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" class="form-select"<?php if($multiple): ?> multiple <?php endif; ?>>
        <option value="">Select <?php echo e(ucfirst($title)); ?></option>
        <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>">
            <?php echo e(str_replace('*', '', $label)); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <label class="error" for="<?php echo e($name); ?>"></label>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function () {
    let $el = $("#<?php echo e($name); ?>");
    let $modalParent = $el.closest(".modal");
    let options = {
        placeholder: "Select <?php echo e(ucfirst($title)); ?>",
        allowClear: true,
    };
    if ($modalParent.length) {
        options.dropdownParent = $modalParent;
    }
    $el.select2(options);
    <?php if(!empty($change)): ?>
    $el.on('change', function () {
        <?php echo e($change); ?>($(this).val());
    });
    <?php endif; ?>
});
</script>
<?php $__env->stopPush(); ?><?php /**PATH D:\wamp64\www\pms2\resources\views/components/mselect.blade.php ENDPATH**/ ?>