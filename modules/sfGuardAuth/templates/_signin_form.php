<?php use_helper('I18N') ?>

<?php if (count($errors=$form->getGlobalErrors()) > 0): ?>
<div class="control-group error">
    <ul class="error_list">
    <?php foreach ($errors as $error): ?>
        <li><?php echo __($error, null, 'tmcTwitterBootstrapPlugin') ?></li>
    <?php endforeach; ?>
    </ul>
</div>
<?php endif ?>

<form class="form-horizontal" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <?php echo $form->renderHiddenFields() ?>

    <div class="control-group<?php echo $form['username']->hasError() ? ' error' : ''?>">
        <?php echo $form['username']->renderLabel(null, array('class' => $form['username']->hasError() ? 'strong' : '')) ?>
        <?php if ($form['username']->hasError()): ?>
            <span class="help-block"><?php echo $form['username']->renderError() ?></span>
        <?php endif ?>
        <?php echo $form['username']->render(array('class' => 'input-xlarge')) ?>
    </div>
    <div class="control-group<?php echo $form['password']->hasError() ? ' error' : ''?>">
        <?php echo $form['password']->renderLabel(null, array('class' => $form['password']->hasError() ? 'strong' : '')) ?>
        <?php if ($form['password']->hasError()): ?>
            <span class="help-block"><?php echo $form['password']->renderError() ?></span>
        <?php endif ?>
        <?php echo $form['password']->render(array('class' => 'input-xlarge')) ?>
    </div>
    <?php if (isset($form['remember'])): ?>
        <label class="checkbox">
            <?php echo $form['remember']->render() ?>
            <?php echo $form['remember']->renderLabelName() ?>
        </label>
    <?php endif; ?>

    <input class="btn" type="submit" value="<?php echo __('Signin', null, 'tmcTwitterBootstrapPlugin') ?>" />
</form>

<?php if (sfConfig::get('app_sfGuardPlugin_signin_links', false)): ?>
    <div id="links">
        <?php if (!include_slot('signin_links')): ?>
            <ul>
                <?php if (isset($routes['sf_guard_forgot_password'])): ?>
                    <li><a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'tmcTwitterBootstrapPlugin') ?></a></li>
                <?php endif; ?>
                <?php if (isset($routes['sf_guard_register'])): ?>
                    <li><a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'tmcTwitterBootstrapPlugin') ?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif ?>
        <div class="clear"></div>
    </div>
    <?php
 endif ?>