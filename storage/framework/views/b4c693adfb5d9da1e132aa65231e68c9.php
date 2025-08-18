<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'size' => 12,
    'name' => 'password',
    'title' => 'password',
    'icon' => 'key',
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
    'name' => 'password',
    'title' => 'password',
    'icon' => 'key',
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
        <input type="password"
            id="<?php echo e($name); ?>"
            name="<?php echo e($name); ?>"
            value="<?php echo e(old($name, $value)); ?>"
            class="form-control"
            placeholder="<?php echo e($title); ?>"
            title="<?php echo e(ucfirst($title)); ?>"
            autocomplete='off'
            <?php if($required): ?> required <?php endif; ?>>
        <button type="button" class="btn btn-outline-secondary toggle-password" 
        onclick="togglePass('<?php echo e($name); ?>', this)">
            <i class="bi bi-eye"></i>
        </button>
    </div>
    <label class="error" for="<?php echo e($name); ?>"></label>
</div>

<?php if (! $__env->hasRenderedOnce('2cb048e5-a522-4a9d-853d-6c2cfce10c77')): $__env->markAsRenderedOnce('2cb048e5-a522-4a9d-853d-6c2cfce10c77'); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
    function togglePass(id, btn) {
        const $input = $('#' + id);
        const $icon = $(btn).find('i');

        if ($input.length === 0 || $icon.length === 0) return;

        const isPassword = $input.attr('type') === 'password';
        $input.attr('type', isPassword ? 'text' : 'password');
        $icon.toggleClass('bi-eye bi-eye-slash');
    }
    </script>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH D:\wamp64\www\pms2\resources\views/components/password.blade.php ENDPATH**/ ?>