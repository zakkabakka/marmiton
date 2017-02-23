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

    protected function getInsertSqlStatement()
    {
        return "SELECT * FROM mesures";
    }
    
    public function getAll()
    {

        $db = AbstractModel::getBD();
        $sql = "SELECT * FROM mesures";
        $mesure = $db->prepare($sql);
        $mesure->execute();
        $mesures = $mesure->fetchAll(\PDO::FETCH_ASSOC);
        // var_dump($mesures);
        return $mesures;
    
    }
    
            /*foreach ($_POST['mesures'] as $key => $mesure) {
                $quantiteData = [
                    'recette_id' => $recetteID,
                    'ingredients_id' => $ingredientID,
                    'mesure_id' => $mesure,
                    'quantite' => $_POST["quantites"][$key]
                ];

                //var_dump($quantiteData);
                print_r($quantiteData);
                $QuantiteModel->addQuantite($quantiteData);
            }*/

}