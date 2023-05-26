<?php
namespace App\Model;

use App\Core\AbstractModel;
use App\Entity\Product;

class ProductModel extends AbstractModel{

    public function search($search){
        $sql = 'SELECT * FROM products WHERE title LIKE ?';
        $result = $this->db->getAllResults($sql, ["%$search%"]);
        return $result;
    }

    public function getAllProducts(){
        $sql = 'SELECT * FROM products'; 
        $pdoStatement = $this->db->getAllResults($sql);
        return $this->convertDbTableToProductModel($pdoStatement);
    }

    public function getProductById($idProduct){
        $sql = 'SELECT * FROM products
                WHERE idProduct = ?';
        $query = $this->db->getOneResult($sql, [$idProduct]);     
        return new Product($query);
    }

    public function getProductsByCategory($idCategory){
        $sql = 'SELECT * FROM products WHERE categoryId = ?'; 
        $query = $this->db->getAllResults($sql, [$idCategory]);     
        return $this->convertDbTableToProductModel($query);
    }

    public function convertDbTableToProductModel($dbTable){
        $products = [];
        foreach($dbTable as $line){
            $products[] = new Product($line);
        }
        return $products;
    }

    
}


function testGetProducts($productcontroller){
    // $result = $productcontroller->getAllProducts();
    $result = $productcontroller->getProductsByCategory(2);
    // var_dump($result);
    foreach ($result as $product) {
        // var_dump($product->getIdProduct());
        var_dump($product->getDescription());
    }
}

function testGetProductById($productcontroller){
    $result =  $productcontroller->getProductById(2);
    var_dump($result->getDescription());
}


$productcontroller = new ProductModel();
// testGetProducts($productcontroller);
// testGetProductById($productcontroller);
