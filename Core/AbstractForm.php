<?php

namespace Marmiton\Core;

use Marmiton\Tools\StringTools;
use Marmiton\Core\FormInterface;

/**
*
*/
abstract class AbstractForm implements FormInterface
{
    protected $fields = [];
    protected $validation_errors = [];

    abstract protected function defineFields();

    function __construct()
    {
        $this->defineFields();
    }

    protected function setVars($data_form)
    {
        foreach ($data_form as $key => $value) {
            if (array_key_exists($key, $this->fields)) {
                if ($this->fields[$key] instanceof FormInterface) {
                    $this->fields[$key]->validateForm($value);
                }
                $this->$key = $value;
            }
        }
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

    public function getValidationErrors()
    {
        return $this->validation_errors;
    }

}