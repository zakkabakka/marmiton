<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;

/**
*
*/
class CommentaireModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'commentaire';
    }

    protected function getInsertSqlStatement()
    {
        return "INSERT INTO commentaire(commentaire, id_recette) VALUES (:commentaire, :id_recette)";
    }

    public function putCommentaire($commentaire)
    {
        return $this->insert($commentaire);
    }

    public function getCommentaire()
    {
        $db = AbstractModel::getBD();

        $sql = "SELECT * FROM commentaire";
        $getCommentaire = $db->query($sql);

        return $commentaire = $getCommentaire->fetchAll(\PDO::FETCH_ASSOC);

    }
    
}