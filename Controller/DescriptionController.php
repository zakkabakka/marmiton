<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\Models\DescriptionModel;
/**
*
*/
class DescriptionController extends AbstractController
{
    public function recetteAction($id)
    {
        //var_dump($_GET['params']);
        
        $params = new DescriptionModel;
        $recetteData = $params->getRecetteID($_GET['params']);
        $etapeData = $params->getEtapeID($_GET['params']);
        $d['etapeData'] = $etapeData;
        $d['recetteDataID'] = $recetteData;
        $this->set($d);

        $this->render('descriptionRecette');
    }

}