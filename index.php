<?php	define('mik', true);

use app\core\Router;

spl_autoload_register(function ($class) {
	$class = str_replace("\\", "/", $class);
	require_once "{$class}.php";
});

$router = new Router();
$router->run();