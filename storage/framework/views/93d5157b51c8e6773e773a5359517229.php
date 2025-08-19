<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'size' => 12,
    'name' => 'datetime',
    'title' => 'Select Date & Time',
    'icon' => 'calendar-event',
    'value' => '',
    'date'=>'true',
    'clock'=>'false',
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
    'name' => 'datetime',
    'title' => 'Select Date & Time',
    'icon' => 'calendar-event',
    'value' => '',
    'date'=>'true',
    'clock'=>'false',
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
    <div class="input-group" id="datetimepicker-<?php echo e($name); ?>">
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
               autocomplete='off'
               <?php if($required): ?> required <?php endif; ?>>
    </div>
    <label class="error" for="<?php echo e($name); ?>"></label>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    new tempusDominus.TempusDominus(document.getElementById('datetimepicker-<?php echo e($name); ?>'), {
        defaultDate: '<?php echo e(old($name, $value)); ?>' || new Date(),
        display: {
            components: {
                calendar: true,
                date: <?php echo e($date); ?>,
                month: true,
                year: true,
                decades: true,
                clock: <?php echo e($clock); ?>,
                hours: <?php echo e($clock); ?>,
                minutes: <?php echo e($clock); ?>,
                seconds: false
            }
        },
        localization: {
            startOfTheWeek: 1, // Monday
            format: '<?php echo e(filter_var($clock, FILTER_VALIDATE_BOOLEAN) ? dttmfmt() : dtfmt()); ?>'
        }
    });
    document.getElementById('<?php echo e($name); ?>').addEventListener('change', function () {
        $(this).valid(); 
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\pms2\resources\views/components/datetime.blade.php ENDPATH**/ ?>