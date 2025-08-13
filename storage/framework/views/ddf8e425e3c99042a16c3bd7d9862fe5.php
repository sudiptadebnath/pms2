<ul class="nav flex-column">

  <!-- Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php"><i class="bi bi-house-door me-2"></i>Dashboard</a>
  </li>

  <!-- Settings (Always open) -->
<?php if(hasRole('s')): ?>
  <li class="nav-item">
    <span class="nav-link"><i class="bi bi-gear me-2"></i>Settings</span>
    <ul class="nav flex-column ms-4">
      <li class="nav-item"><a class="nav-link" href="#">Site</a></li>
    </ul>
  </li>
<?php endif; ?>

<?php if(hasRole('sa')): ?>
  <!-- Admin -->
  <li class="nav-item">
    <span class="nav-link"><i class="bi bi-shield-lock me-2"></i>Admin</span>
    <ul class="nav flex-column ms-4">
      <li class="nav-item"><a class="nav-link" href="<?php echo e(url('user/users')); ?>">Users</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo e(url('user/projects')); ?>">Projects</a></li>
    </ul>
  </li>
<?php endif; ?>

<?php if(hasRole('sam')): ?>
  <!-- Manager -->
  <li class="nav-item">
    <span class="nav-link"><i class="bi bi-person-workspace me-2"></i>Manager</span>
    <ul class="nav flex-column ms-4">
      <li class="nav-item"><a class="nav-link" href="<?php echo e(url('user/tasks')); ?>">Tasks</a></li>
    </ul>
  </li>
<?php endif; ?>

<?php if(hasRole('samw')): ?>
  <!-- Staff -->
  <li class="nav-item">
    <span class="nav-link"><i class="bi bi-person-badge me-2"></i>Staff</span>
    <ul class="nav flex-column ms-4">
      <li class="nav-item"><a class="nav-link" href="<?php echo e(url('user/jobs')); ?>">Jobs</a></li>
    </ul>
  </li>
<?php endif; ?>

<?php if(hasRole('samwc')): ?>
  <!-- Client -->
  <li class="nav-item">
    <span class="nav-link"><i class="bi bi-person-lines-fill me-2"></i>Client</span>
    <ul class="nav flex-column ms-4">
      <li class="nav-item"><a class="nav-link" href="#">Issues</a></li>
    </ul>
  </li>
<?php endif; ?>

</ul><?php /**PATH D:\wamp64\www\pms2\resources\views/layouts/partials/menu.blade.php ENDPATH**/ ?>