<?php
// session_start();
require "../controllers/compteurPanier.php";
require "../controllers/link.php";
use App\Model\OrderModel;
use App\Model\UserModel;
use App\Model\ProductModel;

$userId = $_SESSION["user"]["userId"];

if (!isConnected()) {
    header('location:' .constructUrl('/login'));
    exit;
}

$UserModel= new UserModel();
$customer =  $UserModel->getUserById($userId);


$orderModel = new OrderModel();
$orders = $orderModel->getOrdersByUserId($userId);

$productModel = new ProductModel();




$template = "profile";
include "../template/base.phtml";