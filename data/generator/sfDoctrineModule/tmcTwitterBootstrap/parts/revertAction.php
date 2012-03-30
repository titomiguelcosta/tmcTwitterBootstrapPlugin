    public function executeRevert(sfWebRequest $request)
    {
        $object = $this->getRoute()->getObject();
        $to_version = $request->getParameter('version');
        
        try
        {
            $object->revert($to_version);
            $object->save();
            $this->getUser()->setFlash('notice', 'Item was reverted to version #' . $to_version);
        }
        catch (Exception $exc)
        {
            $this->getUser()->setFlash('error', 'Could not revert item to desired version.', false);
        }
        
        $redirect = $request->getReferer() ? $request->getReferer() : array('sf_route' => '<?php echo $this->getUrlForAction('show') ?>', 'sf_subject' => $object);
        
        $this->redirect($redirect);        

    }