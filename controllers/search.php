<?php
use App\Model\ProductModel;



$search = htmlspecialchars($_GET['search']);

$productModel = new ProductModel();
$searchProduct = $productModel->search($search);

echo json_encode($searchProduct);






