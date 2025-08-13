<?php $__env->startSection('content'); ?>
<div class="container d-flex align-items-center justify-content-center login-container h-100">
<div class="card border-primary col-md-6 col-lg-4">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title mp0">
            <i class="bi bi-box-arrow-in-right"></i> Log in
        </h5>
    </div>
    <div class="card-body">
    <form id="signin" onsubmit="return signin_submt()" novalidate="novalidate">
    <div class="row gy-2">
        <?php if (isset($component)) { $__componentOriginal722f54fa328c8aa4ec9129f4c623ee05 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal722f54fa328c8aa4ec9129f4c623ee05 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text','data' => ['name' => 'email','icon' => 'person','title' => 'Userid/Mail','required' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'email','icon' => 'person','title' => 'Userid/Mail','required' => 'true']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.password','data' => ['name' => 'password','icon' => 'key','title' => 'Password','required' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'password','icon' => 'key','title' => 'Password','required' => 'true']); ?>
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
        <div class="col-md-12">
            <a href = "<?php echo e(url('/forgot')); ?>" >Forget Password ?</a>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-sm w-100">
                <i class="bi bi-box-arrow-in-right"></i> Log in
            </button>
        </div>
        <div class="col-md-12">
            <a href = "<?php echo e(url('/register')); ?>" class="btn btn-outline-primary btn-sm w-100">
                <i class="bi bi-person-plus"></i> Sign up
            </a>
        </div>
    </div></form></div>
</div></div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script> 

$.validator.addMethod("emailOrUid", function(value, element) {
  const isEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
  const isUserID = /^[a-zA-Z0-9@._-]+$/.test(value);
  return this.optional(element) || isEmail || isUserID;
});

$(document).ready(function ($) {
    $("#signin").validate({
      rules: {
        email: {
          required: true,
          emailOrUid: true,
        },
        password: {
          required: true,
          minlength: 4
        }
      },
      messages: {
        email: {
          required: "Please enter your userid/email",
          emailOrUid: "Enter a valid email or user ID"
        },
        password: {
          required: "Please enter your password",
          minlength: "Password must be at least 4 characters"
        }
      }
    });
});

function signin_submt() {
    if($("#signin").valid()) {
        webserv("POST","<?php echo e(url('/login')); ?>", "signin", 
        function ok(d) { goLnk("<?php echo e(url('/user/dashboard')); ?>"); });
    }
    return false;
}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\wamp64\www\pms2\resources\views/index.blade.php ENDPATH**/ ?>