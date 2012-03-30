  public function executeAjax(sfWebRequest $request)
  {
     $class_name = sfInflector::camelize($request->getParameter('model'));
     $id = $request->getParameter('row_id');

     if (class_exists($class_name))
     {
         $method = sfInflector::camelize($request->getParameter('field_name'));
         $method_set = 'set' . $method;
         $method_get = 'get' . $method;

         $record = Doctrine::getTable("{$class_name}")->findOneBy('id', $id);

         if ($record)
         {
             $record->$method_set($request->getParameter('value'));
             $record->save();
         }
     }
     
     return $this->renderText($record->$method_get());
  }
  