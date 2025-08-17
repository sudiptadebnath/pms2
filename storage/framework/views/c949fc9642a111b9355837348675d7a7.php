<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'size' => 12,
    'name' => 'txt',
    'title' => 'Enter content',
    'icon' => 'info-circle',
    'value' => '',
    'required' => false,
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
    'name' => 'txt',
    'title' => 'Enter content',
    'icon' => 'info-circle',
    'value' => '',
    'required' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<?php
    $required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
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
        <input type="text"
            id="<?php echo e($name); ?>"
            name="<?php echo e($name); ?>"
            value="<?php echo e(old($name, $value)); ?>"
            class="form-control"
            placeholder="<?php echo e(ucfirst($title)); ?>"
            title="<?php echo e(ucfirst($title)); ?>"
            <?php if($required): ?> required <?php endif; ?>>
    </div>
    <label class="error" for="<?php echo e($name); ?>"></label>
</div>
<?php /**PATH C:\wamp64\www\pms2\resources\views/components/text.blade.php ENDPATH**/ ?>