<?php use_helper('I18N') ?>

<?php include_partial('tmcTwitterBootstrap/assets') ?>
<?php include_component('tmcTwitterBootstrap', 'header') ?>

<div id="login" class="container">
    <h1><?php echo __(sfConfig::get('app_sfGuardPlugin_header_title', 'Tito Miguel Costa'), null, 'tmcTwitterBootstrapPlugin') ?></h1>
    <div class="hero-unit">
        <div class="pull-left login-left">
            <?php include_partial('logo') ?>
        </div>
        <div class="pull-left login-right">
            <h2><?php echo __('Administration area', null, 'tmcTwitterBootstrapPlugin') ?></span></h2>

            <?php include_partial('alerts') ?>
            <?php include_partial('signin_form', array('form' => $form, 'routes' => $sf_context->getRouting()->getRoutes())) ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php include_component('tmcTwitterBootstrap', 'footer') ?>