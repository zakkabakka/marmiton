<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\models\UserModel;
/**
* 
*/
class UserController extends AbstractController
{
    public function addUser($data)
    {
        $userModel = new UserModel();
        //$userModel->addUser($data);
        $getId = $userModel->getIdUser();
        // var_dump($getId);
        // var_dump($data);
        // $this->render('recette');
        
    }

}