  public function executeUpdate(sfWebRequest $request)
  {
    $this->sidebar_status = $this->configuration->getEditSidebarStatus();
    $this-><?php echo $this->getSingularName() ?> = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this-><?php echo $this->getSingularName() ?>);
    $this->fields = $this-><?php echo $this->getSingularName() ?>->getTable()->getColumnNames();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
