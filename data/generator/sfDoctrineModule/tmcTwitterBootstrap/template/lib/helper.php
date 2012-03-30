[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends sfModelGeneratorHelper
{
    public function getUrlForAction($action)
    {
        return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
    }

    public function linkToDelete($object, $params)
    {
        if ($object->isNew())
        {
            return '';
        }

        return link_to('<i class="icon-trash icon-white"></i> '.__($params['label'], array(), 'tmcTwitterBootstrapPlugin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'class' => 'btn btn-small btn-danger', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'tmcTwitterBootstrapPlugin') : $params['confirm']));
    }

    public function linkToEdit($object, $params)
    {
        return link_to('<i class="icon-pencil icon-black"></i> '.__($params['label'], array(), 'tmcTwitterBootstrapPlugin'), $this->getUrlForAction('edit'), $object, array('class' => 'btn btn-small'));
    }

    public function linkToShow($object, $params)
    {
        return link_to('<i class="icon-list icon-black"></i> '.__($params['label'], array(), 'tmcTwitterBootstrapPlugin'), $this->getUrlForAction('show'), $object, array('class' => 'btn btn-small'));
    }

    public function linkToSave($object, $params)
    {
        return '<input class="btn btn-primary" type="submit" value="'.__($params['label'], array(), 'tmcTwitterBootstrapPlugin').'" />';
    }
    public function linkToNew($params)
    {
        return link_to('<i class="icon-plus icon-white"></i> '.__($params['label'], array(), 'tmcTwitterBootstrapPlugin'), '@'.$this->getUrlForAction('new'), array('class' => 'btn btn-success btn-small'));
    }
    public function linkToSaveAndAdd($object, $params)
    {
        if (!$object->isNew())
        {
            return '';
        }

        return '<input class="btn btn-success" type="submit" value="'.__($params['label'], array(), 'tmcTwitterBootstrapPlugin').'" name="_save_and_add" />';
    }
    public function linkToList($params)
    {
        return link_to('<i class="icon-arrow-left icon-black"></i> '.__($params['label'], array(), 'tmcTwitterBootstrapPlugin'), '@'.$this->getUrlForAction('list'), array('class' => 'btn btn-small'));
    }
    public function linkToFilters()
    {
        return '<a class="btn" data-toggle="modal" href="#filters" ><i class="icon-search icon-black"></i> '.__("Filter", null, "tmcTwitterBootstrapPlugin").'</a>';
    }
}