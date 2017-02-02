<?php

var_dump($_SERVER["REQUEST_URI"]);

$uri_params = parse_url($_SERVER["REQUEST_URI"]);

var_dump($uri_params);

include __DIR__ . '/index.php';