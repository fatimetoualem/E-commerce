<?php
require "../controllers/compteurPanier.php";
require "../controllers/link.php";
use App\Model\UserModel;

$userModel = new UserModel();
$resultUsers = $userModel->getAllUsers(); 






include "../template/adminUser.phtml";