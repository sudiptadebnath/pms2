<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
'size' => 12,
'name' => 'tmce',
'title' => 'Enter content',
'height' => 100,
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
'name' => 'tmce',
'title' => 'Enter content',
'height' => 100,
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
    <label for="<?php echo e($name); ?>" class="form-label"><?php echo e(ucfirst($title)); ?></label>
    <textarea name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"><?php echo e(old($name, $value)); ?></textarea>
    <label class="error" for="<?php echo e($name); ?>"></label>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
$('#<?php echo e($name); ?>').summernote({
    height: <?php echo e($height); ?>,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        //['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link', /*'picture', 'video',*/ 'table']], 
        //['view', ['codeview', 'help']]
    ]
});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\wamp64\www\pms2\resources\views/components/richtext.blade.php ENDPATH**/ ?>