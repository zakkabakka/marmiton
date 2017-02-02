<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\models\RecetteModel;
use Marmiton\Form\RecetteAddForm;
use Marmiton\Controller\UserController;

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
            
            //commencé par le user apres prendre son id pour le add de la recette
            $UserController = new UserController();
            $UserController->addUser($_POST);

            //elle attend
            // $recetteModel = new RecetteModel();
            // $recetteModel->addRecette($_POST);
            $d['what'] = 'add_success';
        };

        $this->set($d);
        $this->render('recette');
    }
}