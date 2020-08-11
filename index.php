<?php
ob_start();
session_start();

// header('Cache-control: private');
// define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
// define('APP_DIR', ROOT_DIR .'application/');
// require(APP_DIR .'config/config.php');
// require(APP_DIR .'config/base.php');

// define('BASE_URL', $config['base_url']);
// define("BASE_PATH", $config['base_path']);
// define('BASE_PLUGIN', $config['base_url'].'application/plugins/');

// require(ROOT_DIR .'system/view.php');
// require(ROOT_DIR .'system/controller.php');
// require(ROOT_DIR .'system/pip.php');

// new run('pip');


// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'application/');

// Includes
require(APP_DIR .'config/config.php');
require(ROOT_DIR .'system/model.php');
require(ROOT_DIR .'system/view.php');
require(ROOT_DIR .'system/controller.php');
require(ROOT_DIR .'system/pip.php');

// Define base URL
global $config;
define('BASE_URL', $config['base_url']);

new run('pip');


?>