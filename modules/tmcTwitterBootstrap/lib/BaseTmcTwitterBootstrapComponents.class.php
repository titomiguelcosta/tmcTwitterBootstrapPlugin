<?php

/**
 * tmcTwitterBootstrapPlugin configuration.
 *
 * @package     tmcTwitterBootstrapPlugin
 * @subpackage  components
 * @author      Tito Miguel Costa <symfony@titomiguelcosta.com>
 */
class BaseTmcTwitterBootstrapComponents extends sfComponents
{

    public function executeHeader()
    {
        $this->header = sfConfig::get('app_tmcTwitterBootstrapPlugin_header', array());
        $this->setVar('menus', array_key_exists('menu', $this->header) ? $this->header['menu'] : array('Home' => 'homepage'), true);
        $this->setVar('routes', $this->getContext()->getRouting()->getRoutes(), true);
        $this->current_route = $this->getContext()->getRouting()->getCurrentRouteName();
    }

    public function executeFooter()
    {

    }

}