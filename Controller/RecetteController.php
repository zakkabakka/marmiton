<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\models\RecetteModel;
use Marmiton\Form\RecetteAddForm;
use Marmiton\Controller\UserController;
use Marmiton\models\UserModel;
use Marmiton\models\IngredientModel;
use Marmiton\Tools\SendMail;

class RecetteController extends AbstractController
{
    public function addAction()
    {
        $d['what'] = 'add_form';

        if (isset($_POST['submited']) && $_POST['submited'] == 'true') {
            $form = new RecetteAddForm();
            if (!$form->validateForm($_POST)) {
                exit(var_dump($form->getValidationErrors()));
            }
            
            // Insert New User
            $userModel = new UserModel();
            $userID = $userModel->addUser($_POST['user']);

            //Insert Recette
            $recetteModel = new RecetteModel();
            $recetteData = ['nom' => $_POST['nom'], 'id_user' => $userID];
            $recetteID = $recetteModel->addRecette($recetteData);

            //Insert INGREDIENTS
            $ingredientModel = new IngredientModel();

            foreach ($_POST['ingredients'] as $key => $ingredient) {

                $ingredientData = [
                    'ingredient' => $ingredient,
                    'recette_id' => $recetteID,
                    'quantite'   => $_POST['quantites']['quantite0']
                ];
                
                //Insert Quantité
                $ingredientID = $ingredientModel->addIngredient($ingredientData);

                //rajouter l'id au tableau pour l'envoyer au model pour inseret la quantité
                $ingredientData['id_ingredient'] = $ingredientID;
                $ingredientModel->addQuantite($ingredientData);
                $ingredientData['id_ingredient'];
            }
            //SendMailDeConfirmation
            $sendMail = new SendMail();
            $email  = $_POST['user']['email'];
            $sendMail->mail_confirmation($email);

            $d['what'] = 'add_success';
        };

        $this->set($d);
        $this->render('recette');
    }
}