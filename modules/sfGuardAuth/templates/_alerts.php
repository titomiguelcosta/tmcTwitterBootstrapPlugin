<?php if ($sf_user->hasFlash('error')): ?>
    <div class="alert alert-error"><?php echo __($sf_user->getFlash('error'), null, 'tmcTwitterBootstrapPlugin') ?></div>
<?php endif; ?>
<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="alert alert-info"><?php echo __($sf_user->getFlash('notice'), null, 'tmcTwitterBootstrapPlugin') ?></div>
<?php endif; ?>