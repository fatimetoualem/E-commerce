<?php
require "../controllers/compteurPanier.php";
require "../controllers/link.php";

use App\Model\ProductModel;

if($_SESSION["user"]["role"] != "admin"){
    http_response_code(404);
    echo 'Erreur 404 : Page introuvable';
    exit;
}

$productModel = new ProductModel();
$resultProducts = $productModel->getAllProducts();





include "../template/admin.phtml";