<?php

namespace Marmiton\Core;

use Marmiton\Tools\StringTools;

/**
* 
*/
abstract class AbstractForm
{
    protected $fields = [];
    protected $validation_errors = [];

    function __construct()
    {

    }

    public function validateForm($data_form)
    {
        $this->setVars($data_form);

        foreach ($this->fields as $key => $value) {
            if (method_exists($this, 'validate'. StringTools::toCamelCase($key, true))) {
                call_user_method('validate'.$key, $this);
            }
        }

        if (count($this->validation_errors) > 0) {
            return false;
        }
        else {
            return true;
        }
    }

    protected function setVars($data_form)
    {
        foreach ($data_form as $key => $value) {
            if (array_key_exists($key, $this->fields)) {
                $this->$key = $value;
            } 
        }
    }

    public function getValidationErrors()
    {
        return $this->validation_errors;
    }

}