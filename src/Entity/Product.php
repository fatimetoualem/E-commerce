<?php
namespace App\Entity;

class Product{
    private int $idProduct;
    private string $title;
    private string $image;
    private string $description;
    private int $price;
    private int $quantity;
    private int $categoryId;

    public function __construct(array $data = [])
    {
        foreach ($data as $propertyName => $value) {
            $setter = 'set' . ucfirst($propertyName);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
        
    public function getIdProduct(): int{
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct){
        $this->idProduct = $idProduct;
    }

    public function getTitle(): string{
        return $this->title;
    }
    public function setTitle(string $title){
        $this->title = $title;
    }

    public function getImage(): string{
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }

    public function getDescription(): string{
        return $this->description;
    }
    public function setDescription(string $description){
        $this->description = $description;
    }

    public function getPrice(): int{
        return $this->price;
    }
    public function setPrice(int $price){
        $this->price = $price;
    }

    public function getQuantity(): int{
        return $this->quantity;
    }
    public function setQuantity(int $quantity){
        $this->quantity = $quantity;
    }

    public function getCategoryId(): int{
        return $this->categoryId;
    }
    public function setCategoryId(int $categoryId){
        $this->categoryId = $categoryId;
    }
}
