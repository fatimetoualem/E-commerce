<?php
namespace App\Model;

use App\Core\AbstractModel;

class AdminModel extends AbstractModel{

    public function updateProductById ($title, $image, $description, $price, $quantity, $idProduct){
        $sql = 'UPDATE products SET title=?, image=?, description=?,
                price=?, quantity=? WHERE idProduct=?';
        $this->db->prepareAndExecute($sql, [$title, $image, $description, $price, $quantity, $idProduct]);
    }

    public function deleteProductById($idProduct){
        $sql = 'DELETE FROM products WHERE idProduct=?';
        $this->db->prepareAndExecute($sql, [$idProduct]);
    }

    public function AddProductToCategory($title, $image, $description, $price, $quantity, $categoryId){
        $sql = 'INSERT INTO products
            (title, image, description, price, quantity, categoryId)
            VALUES (?,?,?,?,?,?)';
        $this->db->prepareAndExecute($sql, [$title, $image, $description, $price, $quantity, $categoryId]); 
    }

    public function deleteUserById($idUser){
        $sql = 'DELETE FROM users WHERE idUser=?';
        $this->db->prepareAndExecute($sql, [$idUser]);
    }
}
