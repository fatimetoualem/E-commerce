<?php
use App\Model\CategoryModel;
use App\Model\AdminModel;

$categoryModel = new CategoryModel();
$categorys = $categoryModel->getAllCategory();

$adminModel = new AdminModel();

if(isset($_POST["submit"])){
    $title = $_POST["title"];
    $image = $_POST["image"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $category = $_POST["category"];

    $addProduct = $adminModel->AddProductToCategory($title, $image, $description, $quantity, $price, $category);
    header('location:' .constructUrl('/admin'));
    exit;

}



include "../template/addProductAdmin.phtml";