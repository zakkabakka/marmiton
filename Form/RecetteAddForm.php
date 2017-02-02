<?php

namespace Marmiton\Form;

use Marmiton\Core\AbstractForm;
use Marmiton\Form\UserAddForm;
/**
* 
*/
class RecetteAddForm extends AbstractForm
{
    public function defineFields()
    {
        $this->fields = [
            'user' => new UserAddForm(),
            'nom' => "",
            'quantite0' => "",
            'ingredient0' => ""
        ];
    }

    public function validateNom()
    {
        if (empty($this->nom))
            $this->validation_errors['nom'] = "Cannot be empty";

    }

    public function validateQuantite()
    {
        if (empty($this->pseudo))
            $this->validation_errors['quantite0'] = "Cannot be empty";

    }

    public function validateIngredient()
    {
        if (empty($this->ingredient))
            $this->validation_errors['ingredient0'] = "Cannot be empty";

    }

    // public function validatePseudo()
    // {
    //     if (empty($this->pseudo))
    //         $this->validation_errors['pseudo'] = "Cannot be empty";

    // }

    // public function validateEmail()
    // {
    //     if (empty($this->pseudo))
    //         $this->validation_errors['email'] = "Cannot be empty";

    // }
}