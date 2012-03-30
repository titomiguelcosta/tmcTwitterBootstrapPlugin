  public function executeShow(sfWebRequest $request)
  {
    $this->sidebar_status = $this->configuration->getShowSidebarStatus();
    $hide = array();
    $this-><?php echo $this->getSingularName() ?> = $this->getRoute()->getObject();
    $this->fields = array_diff($this-><?php echo $this->getSingularName() ?>->getTable()->getColumnNames(), $hide);
  }
