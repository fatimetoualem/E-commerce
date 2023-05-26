<?php
namespace App\Model;

use App\Core\AbstractModel;
use App\Entity\Favorites;

class FavoritesModel extends AbstractModel{
    
    public function addFavorites($idUser, $idProduct){

        $sql = 'INSERT INTO favorites (idUser, idProduit)
                VALUES (?,?)';
                $this->db->prepareAndExecute($sql, [$idUser, $idProduct]);
    }
}