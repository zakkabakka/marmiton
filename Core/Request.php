<?php

namespace Marmiton\Core;

use Marmiton\Tools\StringTools;

use Marmiton\Core\AbstractController;

class Request
{

    const CONTROLLER_NS = 'Marmiton\\Controller\\';

    protected $controller;
    protected $action;

    public static function create()
    {
        return new self();
    }

    public function dispatch()
    {
        //var_dump($_GET);

        if (isset($_GET['controller'])) {
            try {
                $this->getController($_GET['controller']);
            } catch (\Exception $e) {
                return $this->error404($e->getMessage());
            }

            if (isset($_GET['action'])) {
                //var_dump($_GET['action']);
                // $actionExplod = explode('/', $_GET['action']);
                // $action = $actionExplod[0];
                try {
                 return $this->executeAction($_GET['action']);
                } catch (\Exception $e) {
                    return $this->error404($e->getMessage());
                }
            }
            else {
                $this->error404();

                return $controller->indexAction();
            }
        }
        else {
            $controller = $this->getController('Accueil');
            return $this->controller->indexAction();
        }
    }

    protected function getController($name)
    {
        $controller = static::CONTROLLER_NS . StringTools::toCamelCase($name, true) . 'Controller';
        
        if (class_exists($controller)) {
            $this->controller = new $controller();
        }
        else {
            throw new \Exception("No Controller Found with Name : " . $controller);
        }
    }

    protected function executeAction($action)
    {
        //var_dump($action);
        $action = StringTools::toCamelCase($action) . 'Action';
        
        if (method_exists($this->controller, $action)) {

            $params = (isset($GET['params']))? $GET['params'] : null;
            // var_dump($GET['params']);
            return $this->controller->$action($params);
        }
        else {
            throw new \Exception("No Action Found with Name : " . $action . " For Controller with Name : " . $this->controller);
        }
    }

    protected function error404($msg)
    {
        echo '<h1>404 NOT FOUND</h1>';
        echo '<p style="color:red">'.$msg.'</p>';
    }
}