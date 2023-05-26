<?php
// session_start();
require "../controllers/compteurPanier.php";
require "../controllers/link.php";
use App\Model\UserModel;

$userId = $_SESSION["user"]["userId"];


$userModel = new UserModel();
$customers = $userModel->getUserById($userId);


$gender = $customers->getGender();
$name = $customers->getName();
$firstName = $customers->getFirstName();


if(isset($_POST["submit"])){
    $gender = htmlspecialchars($_POST["gender"]);
    $name = htmlspecialchars($_POST["name"]);
    $firstName = htmlspecialchars($_POST["firstName"]);

    $userModel->editInformationUser($gender, $name, $firstName, $userId);

    header('location:' .constructUrl('/profile'));
    exit;
}




include "../template/editPersonalInformation.phtml";