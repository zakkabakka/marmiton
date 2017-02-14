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

            /* Add User First */
            $userModel = new UserModel();
            $userID = $userModel->addUser($_POST['user']);

            /* Add Recette */
            $recetteModel = new RecetteModel();
            $recetteData = ['nom' => $_POST['nom'], 'id_user' => $userID];
            $recetteID = $recetteModel->addRecette($recetteData);

            /* Add Ingredients */
            $ingredientModel = new IngredientModel();

            foreach ($_POST['ingredients'] as $key => $ingredient) {
                $ingredientData = [
                    'nom' => $ingredient
                ];
                $ingredientID = $ingredientModel->addIngredient($ingredientData);

            /* Add Quantité with mesure */
                $QuantiteModel = new RecetteHasIngredientsModel;

                foreach ($_POST['mesures'] as $key => $mesure) {

                    $quantiteData = [
                        'recette_id' => $recetteID,
                        'ingredients_id' => $ingredientID,
                        'mesure_id' => $mesure,
                        'quantite' => $_POST["quantites"][$key]
                    ];

                    $QuantiteModel->addQuantite($quantiteData);
                }
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