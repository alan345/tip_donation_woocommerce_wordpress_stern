<?php

/*
  Plugin Name:tip stern
  Plugin URI: http://www.sternwebagency.com
  Description: tip or donation for woocommerce
  Author: Stern
  Version: 1.1
  Author URI: http://www.sternwebagency.com
 */

/* plugin global variable */
global $rpdo_plugin_url, $rpdo_plugin_dir;

$rpdo_plugin_dir = dirname(__FILE__) . "/";
$rpdo_plugin_url = plugins_url()."/" . basename($rpdo_plugin_dir) . "/";
include_once $rpdo_plugin_dir.'lib/main.php';
