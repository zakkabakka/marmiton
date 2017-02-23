<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\Models\CommentaireModel;
/**
*
*/
class CommentaireController extends AbstractController
{
    public function recetteAction($id)
    {
        $this->render('descriptionRecette');
    }

}