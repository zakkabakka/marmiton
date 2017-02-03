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
        $getId = $userModel->getIdUser();
    }

}