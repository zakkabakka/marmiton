<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\models\RecetteModel;
use Marmiton\Form\RecetteAddForm;
//use Marmiton\Controller\UserController;
use Marmiton\models\UserModel;

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
            // $UserController = new UserController();
            // $UserController->addUser($_POST);

            // Insert New User
            $userModel = new UserModel();
            $userID = $userModel->addUser($_POST['user']);

            //elle attend
            $recetteModel = new RecetteModel();
            $recetteData = ['nom' => $_POST['nom'], 'user_id' => $userID];
            $recetteID = $recetteModel->addRecette($recetteData);


            /**
             * AND NOW -> insert INGREDIENTS
             * $ingredientModel = new IngredientModel()
             * foreach $_POST['ingredients'] as $key => $ingredient {
             *     $ingredientData = [
             *         'ingredient' => $ingredient,
             *         'quantite' => $_POST['quantites'][$key],
             *         'recette_id' => $recetteID
             *     ]
             *     $ingredientModel->addIngredient($ingredientData);
             * }
             */

            $d['what'] = 'add_success';
        };

        $this->set($d);
        $this->render('recette');
    }
}