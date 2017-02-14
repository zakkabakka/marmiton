<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;

/**
*
*/
class NotationsModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'notations';
    }

    protected function getInsertSqlStatement()
    {
        
    }
    
}