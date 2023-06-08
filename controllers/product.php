<?php
use App\Model\ProductModel;
require "../controllers/compteurPanier.php";
require "../controllers/link.php";

// Validation du paramètre id de l'URL
if (!array_key_exists('id', $_GET) || !$_GET['id'] || !ctype_digit($_GET['id'])) {
    http_response_code(404);
    echo 'Page introuvable';
    exit; 
}

$idProduct = $_GET['id'];

$productModel = new ProductModel();
$product = $productModel->getProductById($idProduct);


$template = "product";
include "../template/base.phtml";




