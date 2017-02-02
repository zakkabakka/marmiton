<?php

use Marmiton\Core\Request;

define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require __DIR__.'/autoload.php';

$request = Request::create();
$request->dispatch();


