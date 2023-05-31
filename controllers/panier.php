<?php
require "../controllers/compteurPanier.php";
require "../controllers/link.php";
use App\Model\ProductModel;


$productModel = new ProductModel();
$products = [];
$quantities = [];
$total = 0;
foreach($_SESSION["cart"] as $element){
    $idProduct = $element["idProduct"];
    $quantitity = $element["quantity"];
    $product = $productModel->getProductById($idProduct);
    
    $total = $total + ($product->getPrice()) * $quantitity;
    $products[] = $product;
    $quantities[] = $quantitity;
}


$_SESSION["total"] = $total;


$template = "panier";
include "../template/base.phtml";