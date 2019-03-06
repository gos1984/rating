<?php
require_once __DIR__."/config_topld.php";
require_once __DIR__."/vendor/autoload.php";

use core\Router;

try {
	Router::start();
} catch(Exception $e) {
	echo "<div style=\"text-align: center;font-size: 40px; margin: 20% 0 0\"><span style=\"display: inline-block;transform: rotate(90deg);\">:-(</span><br/>Ну вот, ты меня сломал<br/>{$e->getCode()}</div>";
}

?>