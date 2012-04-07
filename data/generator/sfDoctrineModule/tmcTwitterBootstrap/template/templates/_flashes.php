[?php if ($sf_user->hasFlash('success')): ?]
    <div class="alert alert-success">
        <h4 class="alert-heading">[?php echo __('Success', null, 'tmcTwitterBootstrapPlugin') ?]</h4>
        [?php echo __($sf_user->getFlash('success'), array(), '<?php echo $this->getI18nCatalogue() ?>') ?]
    </div>
    [?php $sf_user->setAttribute('success', 'true', 'symfony/user/sfUser/flash/remove') ?]
[?php endif; ?]

[?php if ($sf_user->hasFlash('notice')): ?]
    <div class="alert alert-warning">
        <h4 class="alert-heading">[?php echo __('Warning', null, 'tmcTwitterBootstrapPlugin') ?]</h4>
        [?php echo __($sf_user->getFlash('notice'), array(), '<?php echo $this->getI18nCatalogue() ?>') ?]
    </div>
    [?php $sf_user->setAttribute('notice', 'true', 'symfony/user/sfUser/flash/remove') ?]
[?php endif; ?]

[?php if ($sf_user->hasFlash('error')): ?]
    <div class="alert alert-error">
        <h4 class="alert-heading">[?php echo __('Error', null, 'tmcTwitterBootstrapPlugin') ?]</h4>
        [?php echo __($sf_user->getFlash('error'), array(), '<?php echo $this->getI18nCatalogue() ?>') ?]
    </div>
    [?php $sf_user->setAttribute('error', 'true', 'symfony/user/sfUser/flash/remove') ?]
[?php endif; ?]