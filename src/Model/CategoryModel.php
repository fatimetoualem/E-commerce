<?php

namespace app\Model;
use App\Core\AbstractModel;
use App\Entity\Category;

class CategoryModel extends AbstractModel{

    public function getAllCategory(){
        $sql = 'SELECT * FROM categorys'; 
        $pdoStatement = $this->db->getAllResults($sql);
        return $this->convertDbTableToProductModel($pdoStatement);
    }

    public function convertDbTableToProductModel($dbTable){
        $products = [];
        foreach($dbTable as $line){
            $products[] = new Category($line);
        }
        return $products;
    }

}