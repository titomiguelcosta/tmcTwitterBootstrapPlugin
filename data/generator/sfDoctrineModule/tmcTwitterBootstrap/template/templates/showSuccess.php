[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/header') ?]

<div class="container-fluid">
    <div class="row-fluid">
        [?php if ($sidebar_status): ?]
            [?php include_partial('<?php echo $this->getModuleName() ?>/show_sidebar', array('configuration' => $configuration, '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
        [?php endif; ?]

        <div class="span[?php echo $sidebar_status ? '10' : '12'; ?]">

            <h1>[?php echo <?php echo $this->getI18NString('show.title') ?> ?]</h1>

            [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

            [?php include_partial('show_fields', array('configuration' => $configuration, '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)); ?]

            [?php if (in_array('version', $fields->getRawValue())): ?]
                [?php include_partial('versions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>->getRawValue(), 'fields' => $fields)); ?]
            [?php endif; ?]

            <div class="btn-group">
                <?php foreach ($this->configuration->getValue('show.actions') as $name => $params): ?>
                    <?php if ('_delete' == $name): ?>
                        <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDelete($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>
                    <?php elseif ('_edit' == $name): ?>
                        <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>
                    <?php elseif ('_show' == $name): ?>
                        <?php echo $this->addCredentialCondition('[?php echo $helper->linkToShow($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>
                    <?php elseif ('_list' == $name): ?>
                        <?php echo $this->addCredentialCondition('[?php echo $helper->linkToList('.$this->asPhp($params).') ?]', $params) ?>
                    <?php else: ?>
                        <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params) ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<br />
[?php include_partial('<?php echo $this->getModuleName() ?>/footer') ?]