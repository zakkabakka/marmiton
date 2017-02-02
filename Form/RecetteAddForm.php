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
    

    protected function setVars($data_form)
    {
        parent::setVars();

        // $this->workaroundStringToArray($dataform);
    }

    //  /**
    //  * En attendant d'avoir des tableau dans le formulaire html
    //  * @todo  Supprimer cette methode ainsi que la surcharge setVars()
    //  * une fois que le form html sera correct !
    //  */
    // protected function workaroundStringToArray($dataform)
    // {
    //     foreach ($dataform as $key => $value) {
    //         if (preg_match('/^ingredient[0-9]+$/', $key)) {
    //             $index = intval(substr($key, strlen("ingredient")));
    //             $this->ingredient[$index] = $value;
    //         }
    //         else if (preg_match('/^quantite[0-9]+$/', $key)) {
    //             $index = intval(substr($key, strlen("quantite")));
    //             $this->quantite[$index] = $value;
    //         }
    //     }

    // }

    public function validateNom()
    {
        if (empty($this->nom))
            $this->validation_errors['nom'] = "Cannot be empty";

    }

    public function validatePseudo()
    {
        if (empty($this->pseudo))
            $this->validation_errors['pseudo'] = "Cannot be empty";

    }

    public function validateEmail()
    {
        if (empty($this->pseudo))
            $this->validation_errors['email'] = "Cannot be empty";

    }

    public function validateQuantite()
    {
        if (empty($this->pseudo))
            $this->validation_errors['quantite'] = "Cannot be empty";

    }

    public function validateIngredient()
    {
        if (empty($this->ingredient))
            $this->validation_errors['ingredient'] = "Cannot be empty";

    }
}