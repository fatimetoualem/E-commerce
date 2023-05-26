<?php
use App\Services\CartSession;

$delete = htmlspecialchars($_GET["del"]);

$CartController = new CartSession();
$CartController->delete($delete);


header('location:' . constructUrl('/panier'));

