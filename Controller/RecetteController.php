<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\Models\RecetteModel;
use Marmiton\Form\RecetteAddForm;
use Marmiton\Controller\UserController;
use Marmiton\Models\UserModel;
use Marmiton\Models\IngredientModel;
use Marmiton\Models\MesureModel;
use Marmiton\Models\RecetteHasIngredientsModel;
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

            //Insert New User
            $userModel = new UserModel();
            $userID = $userModel->addUser($_POST['user']);
            var_dump($userID);
            
            //Insert Recette
            $recetteModel = new RecetteModel();
            $recetteData = ['nom' => $_POST['nom'], 'id_user' => $userID];
            $recetteID = $recetteModel->addRecette($recetteData);

            //Insert INGREDIENTS
            $ingredientModel = new IngredientModel();

            foreach ($_POST['ingredients'] as $key => $ingredient) {
                $cle = preg_match_all('!\d+!', $key, $matches);
                $ingredientData = [
                    'ingredient' => $ingredient,
                    'recette_id' => $recetteID,
                    'quantite'   => $_POST["quantites"][$key]
                ];

                //Insert quantité
                $ingredientID = $ingredientModel->addIngredient($ingredientData);
                //rajouter l'id au tableau pour l'envoyer au model pour inseret la quantité
                $ingredientData['id_ingredient'] = $ingredientID;
                $QuantiteModel = new RecetteHasIngredientsModel;

                $QuantiteModel->addQuantite($ingredientData);
                // var_dump($ingredientData);
            }

            //SendMailDeConfirmation
            $sendMail = new SendMail();

            $email  = $_POST['user']['email'];
            if (isset($email)) {
                $sendMail->mail_confirmation($email);
            }


            $d['what'] = 'add_success';
        }
        else {
            $d['mesures'] = MesureModel::getAll();
        }

        $this->set($d);
        $this->render('recette');
    }
}