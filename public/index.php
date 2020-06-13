<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

define('ROOT', dirname(__DIR__));
define('ROUTE', ROOT . '/routes');
define('PUBLIC', __DIR__);
define('STORAGE', ROOT . '/storage');
define('RESOURCES', ROOT . '/resources');

require ROOT . '/vendor/autoload.php';
require STORAGE . '/session.php';

$config = require_once ROUTE . '/web.php';

$app = new App\Kernel\Core($config);

try {
    $app->up();
} catch (Exception $e) {
    echo $e->getMessage();
}
