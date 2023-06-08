<?php
// session_start();
use App\Model\UserModel;
require "../controllers/compteurPanier.php";
require "../controllers/link.php";

if (array_key_exists('flashbag', $_SESSION) && $_SESSION['flashbag']) {
    $flashMessage = $_SESSION['flashbag'];
    $_SESSION['flashbag'] = null;
}

$error = [];
$usersModel = new UserModel();


$pattern = '/^(?=.*[A-Z])(?=.*[\W_])(?=.*\d).{8,}$/';
if(!empty($_POST)){
    $gender = htmlspecialchars($_POST["gender"]);
    $name = htmlspecialchars(trim($_POST["name"]));
    $firstName = htmlspecialchars(trim($_POST["firstName"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $address = htmlspecialchars($_POST["address"]);
    $password = htmlspecialchars($_POST["password"]);
    $confrmPassword = htmlspecialchars($_POST["confrmPassword"]);
    $postalCode = htmlspecialchars($_POST["postalCode"]);
    $city = htmlspecialchars($_POST["city"]);

    $name = ucwords(strtolower($name), "-");
    $firstName = ucwords(strtolower($firstName), "-");

    if(!$gender){
        $error["gender"] = "Merci d'indiquer un genre";
    }

    if(!$name){
        $error["name"] = "Merci d'indiquer un nom !";
    }

    if(!$firstName){
        $error["firstName"] = "Merci d'indiquer un prénom !";
    }

    if(!$email){
        $error["email"] = "Merci d'indiquer une adresse mail !";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "L'email n'est pas valide";
    }

    if(!$address){
        $error["address"] = "Merci d'indiquer un addresse";
    }
    if($usersModel->verifyMail($email) == true){
        $error['email'] = "Cette mail est déjà utilisée";
    }
    if(!$password){
        $error["password"] = "Merci d'indiquer un mot de passe !";
    }

    if(!$confrmPassword){
        $error["confrmPassword"] = "Merci d'indiquer une confirmation de mot de passe !";
    }

    if (!preg_match($pattern, $password)) {
        $error["password"] = "Le mot de passe invalid";
    }
    elseif($password != $confrmPassword){
        $error["confrmPassword"] = "le mot de passe ne coresspond pas !";
    }

    if(!$postalCode){
        $error["postalCode"] = "Merci d'indiquer un code postal";
    }

    if(!$city){
        $error["city"] = "Merci d'indiquer un ville";
    }

    if(empty($error)){
        $usersModel->addUsers($gender, $name, $firstName, $email, $address, password_hash($password, PASSWORD_DEFAULT), $postalCode, $city);

        $_SESSION['flashbag'] = 'Votre compte a été créé avec succès.';
        header('location:' .constructUrl('/login'));
        exit;
    }
}


// // require "../lib/functions.php";

// // function isConnected(): bool{
// //     return array_key_exists('user', $_SESSION) && $_SESSION['user'];
// // }

// if (isConnected()) {
//     header('location:' .constructUrl('/maquillage'));
//     exit;
// }

$template = "inscription";
include "../template/base.phtml";