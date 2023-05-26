<?php

namespace App\Entity;

class User{
    private int $idUser;
    private string $role;
    private string $gender;
    private string $name ;
    private string $firstName;
    private string $email;
    private int $createdAt;
    private string $password;
    private string $address;
    private int $postalCode;
    private string $city;

    public function __construct(array $data = [])
    {
        foreach ($data as $propertyName => $value) {
            $setter = 'set' . ucfirst($propertyName);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    public function getIdUser():int {
        return $this->idUser;
    }
    public function setIdUser($idUser){
        $this->idUser = $idUser;
    }

    public function getRole():string {
        return $this->role;
    }
    public function setRole($role){
        $this->role = $role;
    }

    public function getName():string {
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getGender():string {
        return $this->gender;
    }
    public function setGender($gender){
        $this->gender = $gender;
    }

    public function getFirstName():string {
        return $this->firstName;
    }
    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    public function getEmail():string {
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function getCreatedAt():int {
        return $this->createdAt;
    }
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }

    public function getPassword():string {
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    public function getAddress():string {
        return $this->address;
    }
    public function setAddress($address){
        $this->address = $address;
    }

    public function getPostalCode():string {
        return $this->postalCode;
    }
    public function setPostalCode($postalCode){
        $this->postalCode = $postalCode;
    }

    public function getCity():string {
        return $this->city;
    }
    public function setCity($city){
        $this->city = $city;
    }
}