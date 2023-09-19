<?php

/**
 * Plugin Name: SLS Plugins
 * Description: Enables one or more plugins that does various functions for the website
 * Version: 0.0.1
 * Author: Krisztián Lakatos (SLS It Services)
 * Author URI: slsitservices.com
 *
 * @package sls-plugins
 */
if (!defined('ABSPATH')) {
    die('-1');
}

define('SLS_PLUGIN_PATH', __DIR__);
define('SLS_CLASSES_PATH', SLS_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR);
define('SLS_PAGES_PATH', SLS_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR);
define('SLS_TEMPLATES_PATH', SLS_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'templates'  . DIRECTORY_SEPARATOR);
define('SLS_ASSETS_PATH', SLS_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'assets'  . DIRECTORY_SEPARATOR);
define('SLS_STYLES_URL', plugins_url() . '/sls-plugins/assets/styles/');
define('SLS_SCRIPTS_URL', plugins_url() . '/sls-plugins/assets/scripts/');

if (!class_exists('EventManager')) {
    require SLS_CLASSES_PATH . 'EventManager.php';
}
