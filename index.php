<?php
use App\Core\Router;

require_once 'debug.php';
require_once 'vendor/autoload.php';
require_once 'app/config/db.php';

session_start();

$router=new Router;
$router->run();
