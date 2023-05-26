<?php
use App\Model\ProductModel;
require "../controllers/compteurPanier.php";
require "../controllers/link.php";


$productcontroller = new ProductModel();
$result = $productcontroller->getProductsByCategory(ID_CATEGORY_TEINT); 



$template = "maquillage";
include "../template/base.phtml";