<?php
// session_start();
use App\Model\UserModel;
require "../controllers/compteurPanier.php";
require "../controllers/link.php";

$error = [];
$usersModel = new UserModel();

if(!empty($_POST)){
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if(!$email){
        $error["email"] = "Merci d'indiquer une adresse mail !";
    }

    if(!$password){
        $error["password"] = "Merci d'indiquer un mot de passe !";
    }

    $customer = $usersModel->checkCustomer($email, $password);
    if (!$customer) {
        $error = 'Identifiants incorrects';
    }
    else{
        $_SESSION["user"] = [
            // 'gender' => $customer->getGender(),
            // 'name' => $customer->getName(),
            // 'firstName' => $customer->getFirstName(),
            // 'email' => $customer->getEmail(),
            // 'password' => $customer->getPassword(),
            // 'postalCode' => $customer->getPostalCode(),
            // 'city' => $customer->getCity(),
            'address' => $customer->getAddress(),
            'userId' => $customer->getIdUser(),
            'role' =>$customer->getRole()
        ];

        if(isset($_GET["redirectTo"]) && $_GET["redirectTo"] == "livraison"){
            header('location:' .constructUrl('/livraison'));
            exit;
        }
        
        if($_SESSION["user"]["role"] == "admin"){
            header('location:' .constructUrl('/admin'));
            exit;
        }
        header('location:' .constructUrl('/profile'));
        exit;
    }
}

$template = "login";
include "../template/base.phtml";