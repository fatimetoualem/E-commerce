<?php
require "../controllers/compteurPanier.php";
require "../controllers/link.php";
use App\Model\ProductModel;

// Validation du paramètre id de l'URL
if (!array_key_exists('id', $_GET) || !$_GET['id'] || !ctype_digit($_GET['id'])) {
    http_response_code(404);
    echo 'Page introuvable';
    exit; // Fin de l'exécution du script PHP
}
$idCategory = htmlspecialchars($_GET['id']);

$productController = new ProductModel();
$products = $productController->getProductsByCategory($idCategory);



$template = "category";
include "../template/base.phtml";