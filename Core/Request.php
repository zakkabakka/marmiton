<?php

namespace Marmiton\Core;

use Marmiton\Tools\StringTools;

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
        if (isset($_GET['controller'])) {

            try {
                $this->getController($_GET['controller']);
            } catch (\Exception $e) {
                return $this->error404($e->getMessage());
            }

            if (isset($_GET['action'])) {
                try {
                    return $this->executeAction($_GET['action']);
                } catch (\Exception $e) {
                    return $this->error404($e->getMessage());
                }
            }
            else {
                return $controller->defaultAction();
            }
        }
        else {
            $controller = $this->getController('Default');
            return $controller->defaultAction();
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
        $action = StringTools::toCamelCase($action) . 'Action';

        if (method_exists($this->controller, $action)) {
            return $this->controller->$action();
        }
        else {
            throw new \Exception("No Action Found with Name : " . $action . " For Controller with Name : " . $controller);
        }
    }

    protected function error404($msg)
    {
        echo '<h1>404 NOT FOUND</h1>';
        echo '<p style="color:red">'.$msg.'</p>';
    }
}