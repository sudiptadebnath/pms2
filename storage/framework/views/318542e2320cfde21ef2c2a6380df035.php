
<header class="navbar navbar-expand-lg navbar-dark bg-primary px-3">
<?php if(userLogged()): ?>
  <button class="btn btn-primary d-sm-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
	<i class="bi bi-list"></i>
  </button>
<?php endif; ?>

  <a class="navbar-brand text-white d-flex align-items-center gap-2" href="#">
    <img src=<?php echo e(asset("resources/img/logo.png")); ?> alt="logo" height="32">
    <?php echo e(env('APP_TITLE', 'pms')); ?>

  </a>


  <?php if(userLogged()): ?>
    <?php if (isset($component)) { $__componentOriginala2fc35506c2934933d1f1fa29657f70c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala2fc35506c2934933d1f1fa29657f70c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cmntbtn','data' => ['id' => '1','icon' => 'volume-up','title' => 'Chat - Broadcast to all','style' => 'warning','style2' => 'muted']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cmntbtn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => '1','icon' => 'volume-up','title' => 'Chat - Broadcast to all','style' => 'warning','style2' => 'muted']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala2fc35506c2934933d1f1fa29657f70c)): ?>
<?php $attributes = $__attributesOriginala2fc35506c2934933d1f1fa29657f70c; ?>
<?php unset($__attributesOriginala2fc35506c2934933d1f1fa29657f70c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala2fc35506c2934933d1f1fa29657f70c)): ?>
<?php $component = $__componentOriginala2fc35506c2934933d1f1fa29657f70c; ?>
<?php unset($__componentOriginala2fc35506c2934933d1f1fa29657f70c); ?>
<?php endif; ?> 

	<div class="ms-auto dropdown d-flex align-items-center gap-2">
    <?php if (isset($component)) { $__componentOriginala2fc35506c2934933d1f1fa29657f70c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala2fc35506c2934933d1f1fa29657f70c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cmntbtn','data' => ['id' => '2','icon' => 'chat-dots','title' => 'Chat - Individual','style' => 'info','style2' => 'black','uid' => ''.e(getUsrProp('id')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cmntbtn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => '2','icon' => 'chat-dots','title' => 'Chat - Individual','style' => 'info','style2' => 'black','uid' => ''.e(getUsrProp('id')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala2fc35506c2934933d1f1fa29657f70c)): ?>
<?php $attributes = $__attributesOriginala2fc35506c2934933d1f1fa29657f70c; ?>
<?php unset($__attributesOriginala2fc35506c2934933d1f1fa29657f70c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala2fc35506c2934933d1f1fa29657f70c)): ?>
<?php $component = $__componentOriginala2fc35506c2934933d1f1fa29657f70c; ?>
<?php unset($__componentOriginala2fc35506c2934933d1f1fa29657f70c); ?>
<?php endif; ?> 

	<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
	  <i class="bi bi-person-circle me-2"></i> <?php echo e(getUsrProp("uid") ?? 'User'); ?>

	</a>
	<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
	  <li><a class="dropdown-item" href="<?php echo e(url('/user/profile')); ?>">
		<i class="bi bi-gear me-2"></i>Settings</a></li>
	  <li><hr class="dropdown-divider"></li>
	  <li><a class="dropdown-item" href="<?php echo e(url('/user/logout')); ?>">
		<i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
	</ul>
  </div> 
<?php endif; ?>

</header><?php /**PATH D:\wamp64\www\pms2\resources\views/layouts/partials/topbar.blade.php ENDPATH**/ ?>