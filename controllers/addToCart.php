<?php
use App\Services\CartSession;

$idProduct = $_POST["id-product"];
$quantity = $_POST["quantity"];

$cart = new CartSession();
$cart->add($idProduct, $quantity);


header('Location:'. constructUrl('/product', ['id'=>$idProduct]));
exit;