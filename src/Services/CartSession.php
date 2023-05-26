<?php

namespace App\Services;

class CartSession{

    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        // On initialise la panier en session
        if(!isset($_SESSION["cart"])){
            $_SESSION["cart"] = [];
        }
    }

    public function add($idProduct, $quantity){
        // Si le produit est déja dans le panier
        if($this->getProduct($idProduct)){
            // On faire a jour la quantité
            $this->addQuantity($idProduct, $quantity);
        }
        else{
            // On ajoute un nouveau produit dans le panier
            $_SESSION["cart"][] = [
                'quantity' => $quantity,
                'idProduct' => $idProduct,
            ];
        }
    }

    public function getProduct($idProduct){
        // on parcour les produits du panier
        foreach($_SESSION["cart"] as $product){

            // Si le produit qu'on souhaite ajouter est déjà présent dans le panier
            if($product["idProduct"] == $idProduct){
                return $product;
            }
        }

        return null;
    }

    public function addQuantity($idProduct, $quantity){
        // On parcour les produits du panier
        foreach($_SESSION["cart"] as $index => $item){
            // Si le produit qu'on souhaite ajouter est déjà présent dans le panier
            if($item["idProduct"] == $idProduct){
                // On met la quantité à jour
                $_SESSION['cart'][$index]['quantity'] += $quantity;

                return true;
            }
        }
        return false;
    }

    public function count() 
    {
        return count($_SESSION['cart']);
    }

    public function delete($idProduct) {
        foreach ($_SESSION["cart"] as $index => $item) {
          if ($item["idProduct"] == $idProduct) {
            unset($_SESSION["cart"][$index]);
            break;
          }
        }
    }
}