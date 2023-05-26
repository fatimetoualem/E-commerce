<?php
use App\Services\CartSession;


$cart = new CartSession();
$nProducts = $cart->count();
