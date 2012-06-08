<div class="sf_admin_list">
    [?php if (!$pager->getNbResults()): ?]
        <p>[?php echo __('No results', array(), 'tmcTwitterBootstrapPlugin') ?]</p>
    [?php else: ?]

    [?php $results = $pager->getResults()->getRawValue() ?]
    [?php $modelname = get_class($results[0]) ?]

    <table class="datatable table table-bordered table-striped" id="table_<?php echo sfInflector::underscore($this->getModuleName()) ?>" style="margin-top: 5px !important;">
        <thead>
            <tr>
            <?php if ($this->configuration->getValue('list.batch_actions')): ?>
                <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
            <?php endif; ?>

            [?php include_partial('<?php echo $this->getModuleName() ?>/list_th_<?php echo $this->configuration->getValue('list.layout') ?>', array('sort' => $sort)) ?]

            <?php if ($this->configuration->getValue('list.object_actions')): ?>
                <th id="sf_admin_list_th_actions">[?php echo __('Actions', array(), 'sf_admin') ?]</th>
            <?php endif; ?>
            </tr>
        </thead>
      <tfoot>
        <tr>
          <th colspan="<?php echo count($this->configuration->getValue('list.display')) + ($this->configuration->getValue('list.object_actions') ? 1 : 0) + ($this->configuration->getValue('list.batch_actions') ? 1 : 0) ?>">
            [?php if ($pager->haveToPaginate()): ?]
            <div style="position: relative; width: auto; float:right">[?php include_partial('<?php echo $this->getModuleName() ?>/pagination', array('pager' => $pager)) ?]</div>
            [?php slot('pagination_extra') ?]
              [?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'tmcTwitterBootstrapPlugin') ?]
            [?php end_slot() ?]
            [?php endif; ?]
            <div style="float: left;font-weight: bold;line-height: 34px;margin-left: 10px;position: relative;width: auto;">
                [?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'tmcTwitterBootstrapPlugin') ?]
                [?php include_slot('pagination_extra') ?]
            </div>
          </th>
        </tr>
      </tfoot>
      <tbody>
        [?php foreach ($results as $i => $<?php echo $this->getSingularName() ?>): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?]
          <tr class="sf_admin_row [?php echo $odd ?]" rel="[?php echo $<?php echo $this->getSingularName() ?>->getId() ?]">
            <?php if ($this->configuration->getValue('list.batch_actions')): ?>
                [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_batch_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
            <?php endif; ?>
                [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_<?php echo $this->configuration->getValue('list.layout') ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
            <?php if ($this->configuration->getValue('list.object_actions')): ?>
                [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
            <?php endif; ?>
          </tr>
        [?php endforeach; ?]
      </tbody>
    </table>
  [?php endif; ?]
</div>
<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>