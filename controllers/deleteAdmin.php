<?php
use App\Model\AdminModel;

$idProduct = htmlspecialchars($_GET['id']);

$adminModel = new AdminModel();
$deleteUser = $adminModel->deleteProductById($idProduct);


header('location:' .constructUrl('/admin'));
exit;
