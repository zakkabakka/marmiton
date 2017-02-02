<?php

namespace Marmiton\Form;

use Marmiton\Core\AbstractForm;
/**
* 
*/
class RecetteAddForm extends AbstractForm
{
    /** @var string */
    protected $fields = [
        'nom' => "",
        'pseudo' => "",
        'email' => "",
        'quantite' => [],
        'ingredient' => []
    ];
    

    public function validateNom()
    {
        if (empty($this->nom))
            $this->validation_errors['nom'] = "Cannot be empty";

    }

    public function validateNom()
    {
        if (empty($this->nom))
            $this->validation_errors['nom'] = "Cannot be empty";

    }

    
}