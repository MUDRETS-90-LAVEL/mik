<?php

$url = explode("?", $_SERVER["REQUEST_URI"]);
$url = urldecode($url[0]);
$url = explode("/", $url);
$url = array_pop($url);

return
	[
		'' => ['controller' => 'login', 'action' => 'index'],
        'main' => ['controller' => 'main', 'action' => 'index'],
	];