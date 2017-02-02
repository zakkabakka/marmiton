<?php

use Marmiton\Core\Request;

define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require __DIR__.'/autoload.php';

$request = Request::create();
$request->dispatch();


// require(ROOT.'core/model.php');
// require(ROOT.'core/controller.php');
// require(ROOT.'controllers/accueil.php');
// require(ROOT.'controllers/recette.php');
// // use \Accueil\accueil;

// $controller = isset($_GET['controller']) ? $_GET['controller'] : 'accueil';
// $action = isset($_GET['action']) ? $_GET['action'] : 'index';
// $params = isset($_GET['params']) ? $_GET['params'] : 'index';


// require('controllers/'.$controller.'.php');

// // $controller .'//'
// $controller = new $controller();


// if (method_exists($controller, $action)) {
//     $controller->$action();
// }
// else {
//     echo "404 Page Not Fond";
// }


