  public function getPager($model)
  {
    $class = $this->getPagerClass();

    return new $class($model, $this->getPagerMaxPerPage());
  }

  public function getPagerClass()
  {
    return '<?php echo isset($this->config['list']['pager_class']) ? $this->config['list']['pager_class'] : 'sfDoctrinePager' ?>';
<?php unset($this->config['list']['pager_class']) ?>
  }

  public function getPagerMaxPerPage()
  {
    return sfContext::getInstance()->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.max_per_page', <?php echo isset($this->config['list']['max_per_page']) ? (integer) $this->config['list']['max_per_page'] : 20 ?>, 'admin_module');
<?php unset($this->config['list']['max_per_page']) ?>
  }