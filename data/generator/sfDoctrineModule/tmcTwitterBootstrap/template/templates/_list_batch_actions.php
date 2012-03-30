<?php if ($listActions = $this->configuration->getValue('list.batch_actions')): ?>
<div class="well pull-left margin-right">
    <select name="batch_action" class="input-medium">
        <option value="">[?php echo __('Choose an action', array(), 'tmcTwitterBootstrapPlugin') ?]</option>
        <?php foreach ((array) $listActions as $action => $params): ?>
            <?php echo $this->addCredentialCondition('<option value="'.$action.'">[?php echo __(\''.$params['label'].'\', array(), \''.$this->getI18nCatalogue().'\') ?]</option>', $params) ?>
        <?php endforeach; ?>
    </select>
    [?php $form = new BaseForm(); if ($form->isCSRFProtected()): ?]
        <input type="hidden" name="[?php echo $form->getCSRFFieldName() ?]" value="[?php echo $form->getCSRFToken() ?]" />
    [?php endif; ?]
    <input type="submit" class="btn btn-inverse btn-small" value="[?php echo __('Go', array(), 'tmcTwitterBootstrapPlugin') ?]" />
</div>
<?php endif; ?>