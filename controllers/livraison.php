<?php
// session_start();
require "../controllers/compteurPanier.php";
require "../controllers/link.php";
use App\Model\UserModel;
use App\Model\ProductModel;

if (!isConnected()) {
    header('location:login.php');
    exit;
}

$userId = $_SESSION["user"]["userId"];

$UserModel= new UserModel();
$customer =  $UserModel->getUserById($userId);

$productController = new ProductModel();

$products = [];
$quantities = [];
$total = 0;
foreach($_SESSION["cart"] as $element){
    $idProduct = $element["idProduct"];
    $quantitity = $element["quantity"];
    $product = $productController->getProductById($idProduct);
    
    $total = $total + ($product->getPrice()) * $quantitity;
    $products[] = $product;
    $quantities[] = $quantitity;
}


$template = "livraison";
include "../template/base.phtml";