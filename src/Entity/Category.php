<?php

namespace App\Entity;

class Category{
    private int $idCategory;
    private string $name;

    public function __construct(array $data = [])
    {
        foreach ($data as $propertyName => $value) {
            $setter = 'set' . ucfirst($propertyName);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    public function getIdCategory(): int{
        return $this->idCategory;
    }

    public function setIdCategory(int $idCategory){
        $this->idCategory = $idCategory;
    }

    public function getName(): string{
        return $this->name;
    }

    public function setName(string $name){
        $this->name = $name;
    }
}