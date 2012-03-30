<div class="span2">
    <div class="sidebar-nav">
        <div class="sidebar-inner">
            <div class="well">
                <h3>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h3>
            </div>
            [?php if ($configuration->hasFilterForm()): ?]
            <div class="well">
                <a class="btn" data-toggle="modal" href="#filters" ><i class="icon-search icon-black"></i> [?php echo __('Filter', null, 'tmcTwitterBootstrapPlugin') ?]</a>
            </div>
            [?php endif; ?]
        </div>
    </div>
</div>