<?php
// session_start();
require "../controllers/compteurPanier.php";
require "../controllers/link.php";
use App\Model\OrderModel;
use App\Model\ProductModel;


if (!isConnected()) {
    header('location:login.php');
    exit;
}

$idProducts = [];
foreach($_SESSION["cart"] as $element){
    $idProducts[] = $element["idProduct"];
}
$address = $_SESSION["user"]["address"];
$userId = $_SESSION['user']['userId'];
$total = $_SESSION['total'];

if(!empty($_POST["payment"]) && !empty($_POST["shipping"])){
    $payment = $_POST["payment"];
    $shipping = $_POST["shipping"];

    $orderController = new OrderModel();
    $idOrder = $orderController->saveOrder($userId, $total, $address, $payment, $shipping);

    foreach($idProducts as $idProduct){
        $orderController->saveProductOrder($idProduct, $idOrder);
    }

    $_SESSION['flashbag'] = 'Votre commende a bien été pris en compte !';
}

$productController = new ProductModel();
$products = [];
$quantities = [];
$total = 0;
foreach($_SESSION["cart"] as $index => $element){
    $idProduct = $element["idProduct"];
    $quantitity = $element["quantity"];
    $product = $productController->getProductById($idProduct);
    
    $total = $total + ($product->getPrice()) * $quantitity;
    $products[] = $product;
    $quantities[] = $quantitity;
}




if (array_key_exists('flashbag', $_SESSION) && $_SESSION['flashbag']) {

    $flashMessage = $_SESSION['flashbag'];
    $_SESSION['flashbag'] = null;
}

header('location' .constructUrl('/validate'));

$template = "payment";
include "../template/base.phtml";