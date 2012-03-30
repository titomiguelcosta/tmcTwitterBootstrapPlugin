  public function executeCreate(sfWebRequest $request)
  {
    $this->sidebar_status = $this->configuration->getNewSidebarStatus();
    $this->form = $this->configuration->getForm();
    $this-><?php echo $this->getSingularName() ?> = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
