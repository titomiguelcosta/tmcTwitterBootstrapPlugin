[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<div class="modal" id="filters" style="display: none;">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">x</a>
        <h3>[?php echo __('Filters', null, 'tmcTwitterBootstrapPlugin') ?]</h3>
    </div>
    <div class="modal-body">
        <div class="admin-filter">
            [?php if ($form->hasGlobalErrors()): ?]
                [?php echo $form->renderGlobalErrors() ?]
            [?php endif; ?]

            <form class="form-horizontal form-inline" action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]" method="post">
                [?php echo $form->renderHiddenFields() ?]
                [?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?]
                    [?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?]
                    [?php include_partial('<?php echo $this->getModuleName() ?>/filters_field', array(
                        'name'       => $name,
                        'attributes' => $field->getConfig('attributes', array()),
                        'label'      => $field->getConfig('label'),
                        'help'       => $field->getConfig('help'),
                        'form'       => $form,
                        'field'      => $field,
                        'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
                    )) ?]
                [?php endforeach; ?]

                <div class="modal-footer">
                    [?php echo link_to(__('Reset filter', null, 'tmcTwitterBootstrapPlugin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'btn btn-warning btn-inline')) ?]
                    <input class="btn" type="submit" value="[?php echo __('Filter', array(), 'tmcTwitterBootstrapPlugin') ?]" />
                </div>
            </form>
        </div>
    </div>
</div>
