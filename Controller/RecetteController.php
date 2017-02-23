<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\Form\RecetteAddForm;
use Marmiton\Controller\UserController;
use Marmiton\Models\RecetteModel;
use Marmiton\Models\EtapeRecetteModel;
use Marmiton\Models\UserModel;
use Marmiton\Models\IngredientModel;
use Marmiton\Models\MesureModel;
use Marmiton\Models\EtapeHasRecetteModel;
use Marmiton\Models\RecetteHasIngredientsModel;
use Marmiton\Models\CategorieHasRecettesModel;
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

            $allUsers = $userModel->getAllUsers();
            // var_dump($allUsers);

            $user = $_POST['user']['email'];
            // var_dump($user);

            $userExist = array_search($user, array_column($allUsers, 'email'));
            // var_dump($userExist);

            if ($userExist !== false) {
                $userID = $allUsers[$userExist]['id_user'];
            }
            else {
                $userID = $userModel->addUser($_POST['user']);
            }

            /* Add Recette */
            $recetteModel = new RecetteModel();
            $recetteData = ['nom' => $_POST['nom'], 'id_user' => $userID];


            $recetteID = $recetteModel->addRecette($recetteData);

            /* Add categorie */
            $categorieModel = new CategorieHasRecettesModel();
            $categorieData = ['id_categorie' => $_POST['categorie'], 'id_recette' => $recetteID];
            $categorieID = $categorieModel->addCategorieRecette($categorieData);

            /* Add Ingredients */
            $ingredientModel = new IngredientModel();

            /* Add Quantité with mesure */
            $QuantiteModel = new RecetteHasIngredientsModel;
            $allIngredients = $ingredientModel->getAllIngredients();


            foreach ($_POST['ingredients'] as $key => $ingredient) {

                $ingredient = trim(strtolower($ingredient));

                $ingredientExist = array_search($ingredient, array_column($allIngredients, 'nom'));

                if ($ingredientExist !== false) {
                    $ingredientID = $allIngredients[$ingredientExist]['id_ingredient'];
                }
                else {
                    $ingredientID = $ingredientModel->addIngredient(['nom' => $ingredient]);
                }
                
                $quantiteData = [
                    'recette_id' => $recetteID,
                    'ingredients_id' => $ingredientID,
                    'mesure_id' => $_POST["mesures"][$key],
                    'quantite' => $_POST["quantites"][$key]
                ];

                $QuantiteModel->addQuantite($quantiteData);
            }

            /* Add etape */
            $EtapeRecetteModel = new EtapeRecetteModel;
            $EtapeHasRecetteModel = new EtapeHasRecetteModel;


            foreach ($_POST['etapes'] as $key => $contenuEtape) {

                $etape = $key + 1;

                $etapesData = [
                    'etape' => $etape,
                    'contenu' => $contenuEtape    
                    ];
                //Checké si il Add tout les etapes ou juste une

                // !----------------------------------------
                $etapeID = $EtapeRecetteModel->addEtapeRecette($etapesData);


                $EtapeHasRecetteData = [
                    'id_etape' => $etapeID,
                    'id_recette' => $recetteID
                ];

                $EtapeHasRecetteModel->addEtapeHasRecette($EtapeHasRecetteData);

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