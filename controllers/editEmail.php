<?php
// session_start();
require "../controllers/compteurPanier.php";
require "../controllers/link.php";
use App\Model\UserModel;

$userId = $_SESSION["user"]["userId"];

$userModel = new UserModel();
$customers = $userModel->getUserById($userId);

$email = $customers->getEmail();

if(isset($_POST["submit"])){
    $email = htmlspecialchars($_POST["email"]);

    $userModel->editEmail($email, $userId);

    header('location:' .constructUrl('/profile'));
    exit;
}





include "../template/editEmail.phtml";