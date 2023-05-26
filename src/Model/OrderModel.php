<?php
namespace App\Model;

use App\Core\AbstractModel;
use App\Entity\Order;

class OrderModel extends AbstractModel{

    public function creatNOrder(){
        $base = "Commande n° ";
        $year_first_two = substr(date("Y"), 2, 4); 
        $random_number = rand(100000, 999999);
        return $base.$year_first_two.$random_number;
    }

    public function convertDbTableToOrderEntity($dbTable){
        $orders = [];
        foreach($dbTable as $line){
            $orders[] = new Order($line);
        }
        return $orders;
    }

    public function saveOrder($userId, $total, $address, $payment, $shipping){
        $nOrder = $this->creatNOrder();
        $status = "Prise en compte";
        $sql = 'INSERT INTO orders
            (userId, nOrder, total, address, payment, status, shipping, createdAt)
            VALUES (?,?,?,?,?,?,?,NOW())';
        $this->db->prepareAndExecute($sql, [$userId, $nOrder, $total, $address, $payment, $status, $shipping]); 
        return $this->db->lastInsertId();
    }

    public function saveProductOrder($idProduct, $idOrder){
        $sql = 'INSERT INTO productsinorder
        (productId, orderId ) VALUES (?,?)';
        $this->db->prepareAndExecute($sql, [$idProduct, $idOrder]);
    }

    public function getOrdersByUserId($userId){
        $sql = 'SELECT * FROM orders
        WHERE userId = ?';
        $query = $this->db->getAllResults($sql, [$userId]);    
        return $this->convertDbTableToOrderEntity($query);
    }

    public function getProductsByOrderId($idOrder){
        $sql = 'SELECT * FROM productsinorder
        WHERE orderId = ?';
        $query = $this->db->getAllResults($sql, [$idOrder]);  
        return $query;  
    }
}


function testGetOrders(){
    $orderController = new OrderModel();
    var_dump($orderController->getProductsByOrderId(46));
}

// testGetOrders();