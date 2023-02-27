<?php
require_once('Route.php');

$r = $_GET['r'] ?? '/';

if (isset($routes[$r])) {

	$controllerName = $routes[$r]['controller'];

	$action = $routes[$r]['action'];

	require_once('Controllers/' . $controllerName . '.php');

	$controller = new $controllerName();

	$controller->$action();
} else {
	require_once('Views/404.php');
}

