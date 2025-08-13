<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name' => 'tblunk',
    'title' => 'Table',
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
    'name' => 'tblunk',
    'title' => 'Table',
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

    function getTH($nm,$st) {
        $ans = $nm;
        $ans = preg_replace('/[^a-zA-Z0-9]+/', ' ', $ans);
        $ans = ucwords(strtolower(trim($ans)));
        return $st.$ans;
    }

    foreach($data as &$itm) {
        $st = (strpos($itm["data"], "*") !== false) ? "*" : "";
        $itm["data"] = str_replace("*","",$itm["data"]);
        if(!isset($itm["th"])) $itm["th"] = getTH($itm["data"],$st);
        if(!isset($itm["name"])) $itm["name"] = $itm["data"];
    }

    $opts = array_merge([
        "responsive"=>false,
        "style"=>"primary",
        "add"=>"",
        "edit"=>"",
        "delete"=>"",
        "imp"=>[],
    ], $opts);
    extract($opts);
    $act = ($add || $edit || $delete);
    $efnm = str_replace(" ","_",$title);
    $autoWidth = true;
?>

<div class="container vw-100 mb-3">
    <h3 class="d-flex border-1 border-bottom pb-2">
        <?php echo e($title); ?>

        <?php if($imp): ?>
        <div class="dropdown mb-0 ms-auto exportmenu">
            <button class="btn btn-sm btn-outline-<?php echo e($style); ?> dropdown-toggle" type="button" id="exportMenu-<?php echo e($name); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                Export
            </button>
            <ul class="dropdown-menu" aria-labelledby="exportMenu-<?php echo e($name); ?>">
                <li><a class="dropdown-item export-btn-<?php echo e($name); ?>" data-type="copy"><i class="bi bi-clipboard me-2"></i>Copy</a></li>
                <li><a class="dropdown-item export-btn-<?php echo e($name); ?>" data-type="csv"><i class="bi bi-file-earmark-text me-2"></i>CSV</a></li>
                <li><a class="dropdown-item export-btn-<?php echo e($name); ?>" data-type="excel"><i class="bi bi-file-earmark-excel me-2"></i>Excel</a></li>
                <li><a class="dropdown-item export-btn-<?php echo e($name); ?>" data-type="pdf"><i class="bi bi-file-earmark-pdf me-2"></i>PDF</a></li>
                <li><a class="dropdown-item export-btn-<?php echo e($name); ?>" data-type="print"><i class="bi bi-printer me-2"></i>Print</a></li>
            </ul>
        </div>
        <?php endif; ?>
    </h3>

    <table id="<?php echo e($name); ?>" class="table table-bordered table-hover table-striped w-100">
        <thead class="table-<?php echo e($style); ?>">
            <tr>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            if(isset($opt["width"])) $autoWidth = false;
            ?>
                <th><?php echo e(str_replace("*","",$opt["th"])); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($act): ?>
                <th>
                    Action
                    <?php if($add): ?>
                    <button class="btn btn-sm btn-outline-<?php echo e($style); ?>" title="Add"
                        onclick="<?php echo e($add); ?>()">
                        <i class="bi bi-plus"></i>
                    </button>
                    <?php endif; ?>
                </th>
            <?php endif; ?>           
            </tr>
        </thead>
    </table>
</div>


<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function () {

    <?php if($imp): ?>
	const skipExport<?php echo e($name); ?> = { 
		columns: function (idx, data, node) {
			return <?php echo json_encode($imp, 15, 512) ?>.includes(idx);
		},
        format: {
          body: function (data, row, column, node) {
			return String(data || '')
				.replace(/<br\s*\/?>/gi, '\n')
				.replace(/<\/p>/gi, '\n')
				.replace(/<\/div>/gi, '\n')
				.replace(/<\/?p[^>]*>/gi, '')
				.replace(/<\/?div[^>]*>/gi, '')
				.replace(/<img[^>]*>/gi, '') 
				.replace(/<[^>]+>/g, '')
				.trim();
		  }
        }
	};
    <?php endif; ?>
    
    var <?php echo e($name); ?> = $('#<?php echo e($name); ?>').DataTable({
        autoWidth: <?php echo e($autoWidth ? 'true' : 'false'); ?>,
        order: [],
    <?php if($responsive): ?>
        responsive: true,
    <?php else: ?>
        scrollX: true,
    <?php endif; ?>
        processing: true,
        serverSide: true,
        ajax: "<?php echo e($url); ?>",
    <?php if($imp): ?>
        buttons: [
			{ extend: 'copy', filename: '<?php echo e($efnm); ?>', title: '<?php echo e($title); ?>', 
            className: 'btn-copy d-none', exportOptions: skipExport<?php echo e($name); ?> },
			{ extend: 'csv', filename: '<?php echo e($efnm); ?>', title: '<?php echo e($title); ?>', 
            className: 'btn-csv d-none', exportOptions: skipExport<?php echo e($name); ?> },
			{ extend: 'excel', filename: '<?php echo e($efnm); ?>', title: '<?php echo e($title); ?>', 
            className: 'btn-excel d-none', exportOptions: skipExport<?php echo e($name); ?> },
			{ extend: 'pdf', filename: '<?php echo e($efnm); ?>', title: '<?php echo e($title); ?>', 
            className: 'btn-pdf d-none', exportOptions: skipExport<?php echo e($name); ?> },
			{ extend: 'print', filename: '<?php echo e($efnm); ?>', title: '<?php echo e($title); ?>', 
            className: 'btn-print d-none', exportOptions: skipExport<?php echo e($name); ?> },
		],
    <?php endif; ?>
        createdRow: function (row, data, dataIndex) {
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(strpos($opt["th"], "*") !== false ): ?>
            $(row).addClass(data["<?php echo e($opt['name']); ?>"].toLowerCase());
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        },
        columns: [
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        {
            <?php $__currentLoopData = $col; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key === 'render'): ?>
                    <?php echo e($key); ?>: <?php echo $val; ?>,
                <?php else: ?>
                    <?php echo e($key); ?>: '<?php echo e($val); ?>',
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($edit || $delete): ?>
        {
            data: null, orderable: false, searchable: false,
            className: 'text-center',
            render: function actBtns(data, type, row) {
                return `
                <?php if($edit): ?>
                <button class="btn btn-sm btn-link px-1" title="Edit"
                    onclick="<?php echo e($edit); ?>(${row.id})">
                    <i class="text-info bi bi-pencil"></i>
                </button>
                <?php endif; ?>
                <?php if($delete): ?>
                <button class="btn btn-sm btn-link px-1" title="Delete"
                    onclick="<?php echo e($delete); ?>(${row.id})">
                    <i class="text-danger bi bi-trash"></i>
                </button>
                <?php endif; ?>`;                    
            },
        },
        <?php endif; ?>
        ],
    });

    <?php if($imp): ?>
	$('.export-btn-<?php echo e($name); ?>').on('click', function () {
		var type = $(this).data('type');
		<?php echo e($name); ?>.button(`.btn-${type}`).trigger();
	});	
    <?php endif; ?>
    
    window.addEventListener('resize', function () {
        $('#<?php echo e($name); ?>').DataTable().columns.adjust().responsive.recalc();
    });
});


</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\wamp64\www\pms2\resources\views/components/table.blade.php ENDPATH**/ ?>