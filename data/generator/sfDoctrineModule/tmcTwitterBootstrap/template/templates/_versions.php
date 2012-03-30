<h2>[?php echo __('Version history', null, 'tmcTwitterBootstrapPlugin') ?]</h2>
<div class="clearfix" style="margin-bottom:18px">
    [?php $all_versions = Doctrine_Query::create()->from(get_class($<?php echo $this->getSingularName() ?>->getRawValue()) . 'Version fv')->where('fv.id = ?', $<?php echo $this->getSingularName() ?>->getId())->andWhere('fv.version <> ?', $<?php echo $this->getSingularName() ?>->get('version'))->orderBy('fv.version DESC')->execute(); ?]
    [?php if ($all_versions->count() == 0): ?]
    <em>[?php echo __('No versions found', null, 'tmcTwitterBootstrapPlugin') ?]</em>
    [?php else: ?]
        <script type="text/javascript">
            $(function() {
                $('.tabs').tabs();
            });
        </script>
        <ul class="tabs">
            [?php $shotgun = true; ?]
            [?php foreach ($all_versions as $version): ?]
                <li [?php if ($shotgun == true) { echo 'class="active"'; $shotgun = false; } ?]><a href="#version_[?php echo $version->get('version'); ?]">[?php echo $version->get('version'); ?]</a></li>
            [?php endforeach; ?]
        </ul>
        <div class="pill-content">
            [?php $shotgun = true; ?]
            [?php foreach ($all_versions as $version): ?]
            <div id="version_[?php echo $version->get('version'); ?]" [?php if ($shotgun == true) { echo 'class="active"'; $shotgun = false; } ?]>
                <div class="clearfix" style="margin-bottom: 10px">
                    <a class="btn primary" href="#" onclick="if (confirm('[?php echo __("Are you sure?", null, "tmcTwitterBootstrapPlugin") ?]')) { window.location = '[?php echo url_for('@<?php echo $this->getUrlForAction('show') ?>?id='.$<?php echo $this->getSingularName() ?>->getId()) ?]/revert?version=[?php echo $version->get('version'); ?]' }">[?php echo __('Revert to version', null, 'tmcTwitterBootstrapPlugin') ?] #[?php echo $version->get('version'); ?]</a>
                </div>

                [?php include_partial('show_version_fields', array('fields' => $fields, 'object' => $version, 'original' => $<?php echo $this->getSingularName() ?>));?]
            </div>
            [?php endforeach; ?]
        </div>
    [?php endif; ?]
</div>