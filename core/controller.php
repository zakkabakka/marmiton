<?php

namespace Marmiton\Core;

/**
* Controller 
*/
class Controller
{
    var $vars = array();
    var $layout = 'default';
    
    function set($d)
    {
        $this->vars = array_merge($this->vars);
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
}