<?php
session_start();
require "../lib/functions.php";
require "../app/configDb.php";
require '../vendor/autoload.php';

$path = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);
$path = str_replace('/index.php', '', $path);
$path = explode('?', $path)[0];


if ($path == '') {
    $path = '/';
}


// Routing
switch($path) {
    case '/':
        require "../controllers/maquillage.php";
        break;
    
    case '/category':
        require "../controllers/category.php";
        break;

    case '/product':
        require "../controllers/product.php";
        break;

    case '/search':
        require "../controllers/search.php";
        break;

    case '/profile':
        require "../controllers/profile.php";
        break;

    case '/admin':
        require "../controllers/admin.php";
        break;

    case '/adminUser':
        require "../controllers/adminUser.php";
        break;

    case '/login':
        require "../controllers/login.php";
        break;
        
    case '/logout':
        require "../controllers/logout.php";
        break;

    case '/inscription':
        require "../controllers/inscription.php";
        break; 

    case '/editPersonalInformation':
        require "../controllers/editPersonalInformation.php";
        break;  

    case '/editPassword':
        require "../controllers/editPassword.php";
        break;

    case '/editEmail':
        require "../controllers/editEmail.php";
        break;

    case '/panier':
        require "../controllers/panier.php";
        break;     
    
    case '/addToCart':
        require "../controllers/addToCart.php";
        break; 

    case '/livraison':
        require "../controllers/livraison.php";
        break; 

    case '/delete':
        require "../controllers/delete.php";
        break; 
        
    case '/payment':
        require "../controllers/payment.php";
        break; 

    case '/editAdmin':
        require "../controllers/editAdmin.php";
        break;

    case '/deleteAdmin':
        require "../controllers/deleteAdmin.php";
        break;

    case '/deleteAdminUser':
        require "../controllers/deleteAdminUser.php";
        break;

    case '/addProductAdmin':
        require "../controllers/addProductAdmin.php";
        break;

    case '/favorites':
        require "../controllers/favorites.php";
        break;

    case '/validate':
        require "../controllers/validate.php";
        break;

    default:
        http_response_code(404);
        echo 'Erreur 404 : Page introuvable';
        exit;
}
