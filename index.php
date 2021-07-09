<?php
define('BASEPATH', true);

require 'system/config.php';
require 'system/core/autoload.php';
require 'vendor/autoload.php';

/**
 * Level of reported errors
 */
error_reporting(ERROR_REPORTING_LEVEL);

/**
 * Initialize Router and detection of URI values
 */
$router = new Router();

$controller = $router->getController();
$method = $router->getMethod();
$param = $router->getParam();

/**
 * Controller and method validations and inclusion
 */
if(!CoreHelper::validateController($controller))
  $controller = 'ErrorPage';

require PATH_CONTROLLERS . "{$controller}/{$controller}Controller.php";

$controller .= 'Controller';

if(!CoreHelper::validateMethodController($controller, $method))
  $method = 'exec';

/**
 * Final execution of the controller, method and parameter obtained by URI
 */
$controller = new $controller;

$controller->$method($param);