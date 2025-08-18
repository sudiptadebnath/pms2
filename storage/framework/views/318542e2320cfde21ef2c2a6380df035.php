
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
	<div class="ms-auto dropdown d-flex align-items-center gap-2">
    <button type="button" class="btn btn-link text-info px-1" title="Message"
	onclick="showComment('Messages',null,null,<?php echo e(getUsrProp('id')); ?>)">
        <i class="bi bi-chat-dots"></i>
    </button>
    <button type="button" class="btn btn-link text-warning px-1 me-1" 
	onclick="showComment('Notices')" title="Notices">
        <i class="bi bi-chat-dots"></i>
    </button>
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