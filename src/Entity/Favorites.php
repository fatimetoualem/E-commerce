<?php
namespace App\Entity;

class Favorites{

    private int $idFavorites;
    private int $idUser;
    private int $idProduct;

    public function __construct(array $data = [])
    {
        foreach ($data as $propertyName => $value) {
            $setter = 'set' . ucfirst($propertyName);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    public function getIdFavorites(): int{
        return $this->idFavorites;
    }

    public function setIdFavorites(int $idFavorites){
        $this->idFavorites = $idFavorites;
    }

    public function getIdUser(): int{
        return $this->idUser;
    }

    public function setIdUser(int $idUser){
        $this->idUser = $idUser;
    }

    public function getIdProduct(): int{
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct){
        $this->idProduct = $idProduct;
    }

}