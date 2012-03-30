[?php include_partial('tmcTwitterBootstrap/assets') ?]

<?php if (isset($this->params['css']) && ($this->params['css'] !== false)): ?>
    [?php use_helper('Url'); ?]
    [?php use_stylesheet('<?php echo $this->params['css'] ?>', 'last') ?]
<?php endif; ?>