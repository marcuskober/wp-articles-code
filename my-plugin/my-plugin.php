<?php
/**
 * Plugin Name: My Plugin
 */

use MK\MyPlugin\Main\APP;

define('MYPLUGIN_DIR', plugin_dir_path( __FILE__ ));

require __DIR__ . '/vendor/autoload.php';

(new App())->init();