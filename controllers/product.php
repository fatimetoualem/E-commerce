<?php
use App\Model\ProductModel;
require "../controllers/compteurPanier.php";
require "../controllers/link.php";

$idProduct = htmlspecialchars($_GET['id']);

$productController = new ProductModel();
$product = $productController->getProductById($idProduct);




$template = "product";
include "../template/base.phtml";