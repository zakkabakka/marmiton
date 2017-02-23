<?php

namespace Marmiton\Core;

abstract class AbstractController
{
    const COUNT_DEFAULT_PARAMS = 2;

    protected $actionParameters = [];
    var $vars = array();
    var $layout = 'default';
    
    // abstract public function defaultAction();

    /**
     * Return Controller Name
     * @return string
     */
    function __toString()
    {
        $class_namespace_array = explode('\\', get_called_class());
        $lastone = count($class_namespace_array) - 1;

        return $class_namespace_array[$lastone];
    }

    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
        // var_dump($this->vars);
    }
    
    function render($view)
    {
        extract($this->vars);
        
        ob_start();

        require(ROOT.'Views/'.$view.'/'.$view.'.php');
        
        $contente_for_layout = ob_get_clean();
        
        if ($this->layout == false) {
            echo $contente_for_layout;
        } else {
            require(ROOT.'Views/layout/'.$this->layout.'.php');
        }
    }

    function LoadModel($name) {
        require_once(ROOT.'Models/'.strtolower($name).'.php');
        $this->$name = new $name();
    }

    protected function getActionParameters()
    {
        if (count($_GET) <= static::COUNT_DEFAULT_PARAMS) {
            return false;
        }

        $action_params = $_GET;

        for ($i=0; $i < static::COUNT_DEFAULT_PARAMS; $i++) {
            array_shift($action_params);
        }

        $this->actionParameters = array_values($action_params);
        //var_dump($this->actionParameters);
        return $this->actionParameters;
    }
}