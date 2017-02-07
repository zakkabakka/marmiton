<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\Models\UserModel;
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