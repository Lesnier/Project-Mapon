<?php


//////////////////////////////////////
// Uri values
/////////////////////////////////////

define('URI', $_SERVER['REQUEST_URI']);


define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);

//////////////////////////////////////
// Route values
/////////////////////////////////////

define('FOLDER_PATH', '/mapon-project');

define('ROOT', $_SERVER['DOCUMENT_ROOT']);



define('PATH_VIEWS', FOLDER_PATH . '/app/views/');

define('PATH_CONTROLLERS', 'app/controllers/');

define('HELPER_PATH', 'system/helpers/');

define('LIBS_ROUTE', ROOT . FOLDER_PATH . '/system/libs/');

//////////////////////////////////////
// Core values
/////////////////////////////////////

define('CORE', 'system/core/');
define('DEFAULT_CONTROLLER', 'Home');

//////////////////////////////////////
// Database values
/////////////////////////////////////

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'mapon_db');

//////////////////////////////////////
// Configuration values
/////////////////////////////////////

define('ERROR_REPORTING_LEVEL', -1);