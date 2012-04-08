  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    // max per page
    if ($request->getParameter('max_per_page'))
    {
      $this->setMaxPerPage($request->getParameter('max_per_page'));
    }

    $this->sidebar_status = $this->configuration->getListSidebarStatus();

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    if ($this->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.filters', false, 'admin_module') && $this->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.filters', false, 'admin_module')->count() > 0 ))
    {
        $this->setUser()->setFlash('alert', 'There are active filters, not all results may be shown.');
    }
  }
