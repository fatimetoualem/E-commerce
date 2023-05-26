<?php
// session_start();
use App\Model\ProductModel;
use App\Model\AdminModel;

$idProduct = htmlspecialchars($_GET['id']);

$productController = new ProductModel();
$product = $productController->getProductById($idProduct);


$adminModel = new AdminModel();

if(isset($_POST["submit"])){
    $title = $_POST["title"];
    $image = $_POST["image"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];


    $updateProduct = $adminModel->updateProductById($title, $image, $description, $quantity, $price, $idProduct);
    header('location:' .constructUrl('/admin'));
    exit;
}







include "../template/editAdmin.phtml";