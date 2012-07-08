tmcTwitterBootstrapPlugin
=========================

This is a twitter bootstrap theme for the symfony 1.4 admin generator.

Features
--------

* a theme that integrates Twitter Bootstrap for symfony admin generator
* a sfGuardAuth module to replace the default layout of the sfDoctrineGuardPlugin
* generate admin with show view, option to set the max results in list view

Installation
-----------

Clone this project into plugins folder of your symfony project and enable it in the config/ProjectConfiguration.class.php file.

Copy the sfGuardAuth to the modules of your backend application if you want to replace the sfDoctrineGuardPlugin default theme.

Generate a new administration module with the option `--theme=tmcTwitterBootstrap`

Configuration
-------------

More soon

Portability
===========

If you don't want to use the bundled, minified versions of Bootstrap's CSS and JS or you'd like to use unminified versions in dev, you can set the following app.yml variables:

    all:
      # Change these if you'd like to move/modify CSS & JS files
      tmcTwitterBootstrapPlugin:
        bootstrap_path:              /tmcTwitterBootstrapPlugin/css/bootstrap.min.css
        responsive_bootstrap_path:   /tmcTwitterBootstrapPlugin/css/bootstrap-responsive.min.css
        admin_styles_path:           /tmcTwitterBootstrapPlugin/css/styles.css
        jquery_path:                 /tmcTwitterBootstrapPlugin/js/jquery.min.js
        bootstrap_js_path:           /tmcTwitterBootstrapPlugin/js/bootstrap.min.js
        admin_js_path:               /tmcTwitterBootstrapPlugin/js/global.js

Using
-----

Twitter Bootstrap version 2.0.2 and symfony 1.4

Contributors
------------

* Tito Miguel Costa <titomiguelcosta@titomiguelcosta.com>
* Tiago Carvalho <tiago.carvalho@gmail.com>
* Ben Lancaster https://github.com/benlancaster