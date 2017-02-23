<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\Models\DescriptionModel;
use Marmiton\Models\CommentaireModel;
/**
*
*/
class DescriptionController extends AbstractController
{
    public function recetteAction($id)
    {
        $commentaire = $_POST['commentaire'];
        $id = $_GET['params'];

        $params = new DescriptionModel;
        $recetteData = $params->getRecetteID($id);
        $etapeData = $params->getEtapeID($id);


        $CommentaireModel = new CommentaireModel;

        $commentaireData = [
                    'id_recette' => $id,
                    'commentaire' => $commentaire
                ];

        $CommentaireModel->putCommentaire($commentaireData);

        $CommentaireData = $CommentaireModel->getCommentaire();

        

        $d['CommentaireData'] = $CommentaireData;
        $d['etapeData'] = $etapeData;
        $d['recetteDataID'] = $recetteData;

        $this->set($d);

        $this->render('descriptionRecette');
    }

}