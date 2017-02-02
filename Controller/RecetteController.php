<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\models\RecetteModel as Model;
use Marmiton\Form\RecetteAddForm;

class RecetteController extends AbstractController
{

    public function addAction()
    {
        $d['what'] = 'add_form';

        //comment je peux envoyer les datas que je recupere dans le model
        if (isset($_POST['submited']) && $_POST['submited'] == 'true') {
            $form = new RecetteAddForm();
            if (!$form->validateForm($_POST)) {
                exit(var_dump($form->getValidationErrors()));
            }
            
            $model = new Model();
            $model->addRecette($_POST); 
            $d['what'] = 'add_success';
        };

        $this->set($d);        
        $this->render('recette');
    }

}