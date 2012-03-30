<?php

/**
 * tmcTwitterBootstrapPlugin configuration.
 *
 * @package     tmcTwitterBootstrapPlugin
 * @subpackage  config
 * @author      Tito Miguel Costa <symfony@titomiguelcosta.com>
 */
class tmcTwitterBootstrapPluginConfiguration extends sfPluginConfiguration
{
  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
      if (!sfConfig::has('app_tmcTwitterBootstrapPlugin_header')) {
//          throw new sfException('Make sure you copy app.yml to your application and set plugin configuration values.');
      }

      if (!in_array('tmcTwitterBootstrap', sfConfig::get('sf_enabled_modules', array())))
      {
//          throw new sfException('Make sure you enable the tmcTwitterBootstrap module in your application settings.');
      }
  }
}