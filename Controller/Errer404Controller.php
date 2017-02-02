<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;


class Errer404Controller extends AbstractController
{
    public function errer404Action()
    {   
        $this->render('errer404');
    }

}