<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\Models\MesureModel;
use Marmiton\Models\CategorieHasRecettesModel;

class AjaxController extends AbstractController
{
    public function defaultAction()
    {
        throw new \Exception("No default Ajax Action");
        
    }

    public function getMesuresOptionsAction()
    {   
        
        $mesures = MesureModel::getAll();

        foreach ($mesures as $mesure) {
            echo '<option value="'.$mesure['mesure_id'].'">'.$mesure['mesure'].'</option>';
        }
    }

    public function getCategorieOptionsAction()
    {

        $categorie = CategorieHasRecettesModel::getCategorie();

        foreach ($categorie as $cat) {
            echo '<option value="'.$cat['id_categorie'].'">'.$cat['categorie'].'</option>';
        }
    }

}