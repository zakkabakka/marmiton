<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;

/**
*
*/
class MesureModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'mesures';
    }

    public function getAll()
    {

    }
}