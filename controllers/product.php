<?php
use App\Model\ProductModel;
require "../controllers/compteurPanier.php";
require "../controllers/link.php";

if (!$_GET['id']) {
    http_response_code(404);
    echo 'Page introuvable';
    exit; 
}

$idProduct = htmlspecialchars($_GET['id']);

$productModel = new ProductModel();
$product = $productModel->getProductById($idProduct);



$template = "product";
include "../template/base.phtml";

