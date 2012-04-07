[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/header') ?]

<?php if ($this->configuration->hasFilterForm()): ?>
[?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
<?php endif ?>

<div class="container-fluid">
    <div class="row-fluid">
        [?php if ($sidebar_status): ?]
            [?php include_partial('<?php echo $this->getModuleName() ?>/list_sidebar', array('configuration' => $configuration)) ?]
        [?php endif; ?]

        <div class="span[?php echo $sidebar_status ? '10' : '12'; ?]">
            <div class="pull-right">[?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]</div>

            <h1 style="display: inline">[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h1>

            [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

            <div id="sf_admin_header">
                [?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]
            </div>

            <div id="sf_admin_content">
                <?php if ($this->configuration->getValue('list.batch_actions')): ?>
                    <form class="form-inline" action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
                <?php endif; ?>

                [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]

                <div>
                    [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
                    <div class="well pull-left">[?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]</div>
                </div>
                <?php if ($this->configuration->getValue('list.batch_actions')): ?>
                    </form>
                <?php endif; ?>

                <form class="form-inline" method="get" action="[?php echo url_for('<?php echo $this->getUrlForAction('list') ?>') ?]">
                    <div class="well pull-right">
                        [?php $select = new sfWidgetFormChoice(array(
                                        'multiple' => false,
                                        'expanded' => false,
                                        'choices' => array('15' => __('Max per page', null, 'tmcTwitterBootstrapPlugin'), 5 => 5, 10 => 10, 20 => 20, 50 => 50)
                                    ),
                                    array('class' => 'input-medium')); echo $select->render('max_per_page') ?]
                        <input type="submit" class="btn btn-inverse btn-small" value="[?php echo __('Go', array(), 'tmcTwitterBootstrapPlugin') ?]" />
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>

            [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
        </div>
    </div>
</div>

[?php include_partial('<?php echo $this->getModuleName() ?>/footer') ?]