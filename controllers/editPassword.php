<?php
// session_start();
require "../controllers/compteurPanier.php";
require "../controllers/link.php";
use App\Model\UserModel;

$userId = $_SESSION["user"]["userId"];

$userModel = new UserModel();
$customers = $userModel->getUserById($userId);
$password = $customers->getPassword();

$errors = [];
if(isset($_POST["submit"])){
    $currentPassword = htmlspecialchars($_POST["currentPassword"]);
    $newPassword = htmlspecialchars($_POST["newPassword"]);
    $ConfirmPassword = htmlspecialchars($_POST["ConfirmTheNewPassword"]);

    if(!sha1($currentPassword) == $password){
        $errors["currentPassword"] = "le mot de passe incorecte";
    }

    if(sha1($currentPassword) == $password){
        if($newPassword == $ConfirmPassword){
            $userModel->editPasswordUder($newPassword, $userId);
        }
    }
}

include "../template/editPassword.phtml";