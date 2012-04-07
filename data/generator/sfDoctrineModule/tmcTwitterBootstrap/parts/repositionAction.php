    public function executePromote(sfWebRequest $request)
    {
        $object = $this->getRoute()->getObject();
        $this->forward404Unless($object);
        $object->promote();

        $this->getUser()->setFlash('notice', 'Object promoted.');

        $this->redirect($this->helper->getUrlForAction('list'));
    }

    public function executeDemote(sfWebRequest $request)
    {
        $object = $this->getRoute()->getObject();
        $this->forward404Unless($object);
        $object->demote();

        $this->getUser()->setFlash('notice', 'Object demoted.');
        $this->redirect($this->helper->getUrlForAction('list'));
    }

    public function executeMove(sfWebRequest $request)
    {
        $object = $this->getRoute()->getObject();
        $this->forward404Unless($object);

        $position = (integer) $this->getRequestParameter('position', 0);
        if ($position > 0)
        {
            $object->moveToPosition($position);
            $this->getUser()->setFlash('notice', 'Object has been moved successfully to new position.');
        }
        else
        {
            $this->getUser()->setFlash('error', 'Invalid position.');
        }
        $this->redirect($this->helper->getUrlForAction('list'));
    }