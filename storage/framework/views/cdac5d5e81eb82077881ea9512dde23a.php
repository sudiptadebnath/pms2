<?php $__env->startSection('styles'); ?>
<style>
.active td { color:black !important; }    
.inactive td { color:gray !important; }    
.superadmin td { background-color:#f6fff6 !important; }    
.admin td { background-color:#f4f7e8 !important; }    
.manager td { background-color:#f8f7fc !important; }    
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php
    $opts = [
        "imp"=>[0,1,2,3,4,5,6],
        "add"=>"addUser",
        "edit"=>"editUser",
        "delete"=>"delUser",
        "actions"=>'
            <button type="button" class="btn btn-link text-warning px-1"
            onclick="showComment(\'Comments\',null,null,__)">
                <i class="bi bi-chat-dots"></i>
            </button>
        ',
    ];
    $tbldata = [
        // [ 'th'=>'ID','data'=>'id','name'=>'id','className'=>'text-end', ], 
        [ 'data'=>'uid', ], 
        [ 'data'=>'email', ], 
        [ 'data'=>'*role','className'=>'text-center', ], 
        [ 'data'=>'stat','className'=>'text-center', ], 
        [ 'data'=>'created_at', ], 
        [ 'data'=>'logged_at', ], 
    ];
?>
<?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => ['name' => 'userTable','title' => 'Users','url' => route('users.data'),'data' => $tbldata,'opts' => $opts]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'userTable','title' => 'Users','url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('users.data')),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tbldata),'opts' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($opts)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>

<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="userForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row gy-2">
            <input type="hidden" id="id" name="id" />
            <?php if (isset($component)) { $__componentOriginal722f54fa328c8aa4ec9129f4c623ee05 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text','data' => ['icon' => 'person','name' => 'uid','title' => 'UserID','required' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'person','name' => 'uid','title' => 'UserID','required' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05)): ?>
<?php $attributes = $__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05; ?>
<?php unset($__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal722f54fa328c8aa4ec9129f4c623ee05)): ?>
<?php $component = $__componentOriginal722f54fa328c8aa4ec9129f4c623ee05; ?>
<?php unset($__componentOriginal722f54fa328c8aa4ec9129f4c623ee05); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal722f54fa328c8aa4ec9129f4c623ee05 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text','data' => ['icon' => 'envelope','name' => 'email','title' => 'Mail','required' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'envelope','name' => 'email','title' => 'Mail','required' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05)): ?>
<?php $attributes = $__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05; ?>
<?php unset($__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal722f54fa328c8aa4ec9129f4c623ee05)): ?>
<?php $component = $__componentOriginal722f54fa328c8aa4ec9129f4c623ee05; ?>
<?php unset($__componentOriginal722f54fa328c8aa4ec9129f4c623ee05); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginala7a729e2918fc1247311e0d0672d15e1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala7a729e2918fc1247311e0d0672d15e1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.password','data' => ['name' => 'password','title' => 'Password','required' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'password','title' => 'Password','required' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala7a729e2918fc1247311e0d0672d15e1)): ?>
<?php $attributes = $__attributesOriginala7a729e2918fc1247311e0d0672d15e1; ?>
<?php unset($__attributesOriginala7a729e2918fc1247311e0d0672d15e1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala7a729e2918fc1247311e0d0672d15e1)): ?>
<?php $component = $__componentOriginala7a729e2918fc1247311e0d0672d15e1; ?>
<?php unset($__componentOriginala7a729e2918fc1247311e0d0672d15e1); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginala7a729e2918fc1247311e0d0672d15e1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala7a729e2918fc1247311e0d0672d15e1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.password','data' => ['name' => 'password2','title' => 'Repeat Password','required' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'password2','title' => 'Repeat Password','required' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala7a729e2918fc1247311e0d0672d15e1)): ?>
<?php $attributes = $__attributesOriginala7a729e2918fc1247311e0d0672d15e1; ?>
<?php unset($__attributesOriginala7a729e2918fc1247311e0d0672d15e1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala7a729e2918fc1247311e0d0672d15e1)): ?>
<?php $component = $__componentOriginala7a729e2918fc1247311e0d0672d15e1; ?>
<?php unset($__componentOriginala7a729e2918fc1247311e0d0672d15e1); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['icon' => 'people','name' => 'role','title' => 'Role','value' => roleDict()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'people','name' => 'role','title' => 'Role','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(roleDict())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['icon' => 'check','name' => 'stat','title' => 'Status','value' => statDict()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'check','name' => 'stat','title' => 'Status','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(statDict())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>

$(document).ready(function () {
    
    $("#userForm").validate({
        rules: {
            uid: {
                required: true,
                minlength: 4,
                maxlength: 20,
                pattern: /^[a-zA-Z0-9._-]+$/
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: function () {
                    return $('#id').val() === "";
                },
                minlength: 6
            },
            password2: {
                required: function () {
                    return $('#password').val();
                },
                equalTo: "#password"
            },
            role: {
                required: true,
            },
            stat: {
                required: true,
            },
        },
        messages: {
            uid: {
                required: "User ID is required",
                minlength: "User ID must be at least 4 characters",
                maxlength: "User ID cannot exceed 20 characters",
                pattern: "Only letters, numbers, dots, underscores, and hyphens are allowed"
            },
            email: {
                required: "Email is required",
                email: "Enter a valid email"
            },
            password: {
                required: "Password is required",
                minlength: "Password must be at least 6 characters"
            },
            password2: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            },
            role: {
                required: "Please select role",
            },
            stat: {
                required: "Please select status",
            },
        }
    });
    $('#userForm').on('submit', function (e) {
        e.preventDefault();
        if (!$(this).valid()) return; 

        const id = $('#id').val();
        const isEdit = id !== "";

        // Prepare URL and method
        const url = isEdit ? `users/${id}` : `/register`;
        const method = isEdit ? 'PUT' : 'POST';

        // Now call webserv
        webserv(method, url, "userForm", function ok(d) {
            toastr.success(d["msg"]);
            $('#userModal').modal('hide');
            $('#userTable').DataTable().ajax.reload();
        });
    });

});

function addUser() {
    $('#userForm')[0].reset();
    $('#id').val(''); 
    $('#userModalLabel').text("Add User");
    $('.error').text('');
    $('#userModal').modal('show');
}

function editUser(id) {
    webserv("GET",`users/${id}`, {}, function (d) {
        let user = d["data"];
        $('#id').val(user.id);
        $('#uid').val(user.uid);
        $('#email').val(user.email);
        $('#role').val(user.role);
        $('#stat').val(user.stat);
        $('#password').val('');
        $('#password2').val('');
        $('#userModalLabel').text('Edit User');
        $('#userModal').modal('show');
    });    
}

function delUser(id) {
    myAlert("Are you sure you want to delete this user ?","primary","Yes", function() {
        webserv("DELETE", `users/${id}`, {}, function (d) {
            toastr.success(d["msg"]);
            $('#userTable').DataTable().ajax.reload();
        });        
    },"No");
}

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\pms2\resources\views/user/users.blade.php ENDPATH**/ ?>