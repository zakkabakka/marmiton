<?php

namespace Core\Controller;

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

    function render($filename)
    {
        extract($this->vars);
        
        ob_start();
        require(ROOT.'views/'.get_class($this).'/'.$filename.'.php');
        
        $contente_for_layout = ob_get_clean();
        
        if ($this->layout == false) {
            echo $contente_for_layout;
        } else {
            require(ROOT.'views/layout/'.$this->layout.'.php');
        }
    }
    function LoadModel($name) {
        require_once(ROOT.'models/'.strtolower($name).'.php');
        $this->$name = new $name();
    }
}