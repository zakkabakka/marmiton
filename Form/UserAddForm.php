<?php

namespace Marmiton\Form;

use Marmiton\Core\AbstractForm;

class UserAddForm extends AbstractForm
{
    public function defineFields()
    {
        $this->fields = [
            'pseudo' => "",
            'email' => ""
        ];
    }

    public function validatePseudo()
    {
        if (empty($this->nom))
            $this->validation_errors['pseudo'] = "Cannot be empty";

    }

    public function validateEmail()
    {
        if (empty($this->email))
            $this->validation_errors['email'] = "Cannot be empty";

    }


}