<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'size' => 12,
    'name' => 'sel',
    'title' => 'sel',
    'icon' => 'person',
    'multiple' => true,
    'url' => '',
    'change' => '',
    'onload' => '', 
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
    'multiple' => true,
    'url' => '',
    'change' => '',
    'onload' => '', 
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
        <select name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" class="form-select" <?php if($multiple): ?> multiple <?php endif; ?>>
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
        minimumInputLength: 0,   // 🔹 allow fetch on open
        ajax: {
            url: "<?php echo e($url); ?>",
            dataType: 'json',
            delay: 250,
            cache: false,         // 🔹 always fresh data
            data: function (params) {
                let data = { q: params.term };
                <?php if(!empty($onload)): ?>
                Object.assign(data, <?php echo e($onload); ?>());
                <?php endif; ?>
                return data;
            },
            processResults: function (data) {
                //console.log("processResults",data);
                return {
                    results: data.map(item => ({
                        id: item.id,
                        text: item.name,
                        hours: item.hours
                    }))
                };
            },
        },
        templateResult: function (item) {
            if (!item.id) return item.text;
            return $(`
                <div>
                    <div><strong>${item.text}</strong></div>
                    <div style="font-size:12px; color:gray">${item.hours} Hr</div>
                </div>
            `);
        },
        templateSelection: function (item) {
            return item.text || item.id;
        }
    };

    if ($modalParent.length) {
        options.dropdownParent = $modalParent;
    }

    $el.select2(options);

    $el.on('change', function () {
        if ($(this).val() && $(this).find('option[value=""]').length) {
            $(this).find('option[value=""]').remove();
        }
        <?php if(!empty($change)): ?>
        <?php echo e($change); ?>($(this).val());
        <?php endif; ?>
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\wamp64\www\pms2\resources\views/components/mselect.blade.php ENDPATH**/ ?>