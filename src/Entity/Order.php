<?php
namespace App\Entity;
use DateTimeImmutable;

class Order{
    private int $idOrder;
    private string $nOrder;
    private string $status;
    private int $total;
    private string $address;
    private string $payment;
    private string $shipping;
    private int $userId;
    private array $productsId;
    private DateTimeImmutable $createdAt;

    public function __construct(array $data = [])
    {
        foreach ($data as $propertyName => $value) {
            $setter = 'set' . ucfirst($propertyName);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    public function getIdOrder():int {
        return $this->idOrder;
    }
    public function setIdOrder($idOrder){
        $this->idOrder = $idOrder;
    }

    public function getStatus():string {
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }

    public function getTotal():int {
        return $this->total;
    }
    public function setTotal($total){
        $this->total = $total;
    }

    public function getAddress():string {
        return $this->address;
    }
    public function setAddress($address){
        $this->address = $address;
    }

    public function getPayment():string {
        return $this->payment;
    }
    public function setPayment($payment){
        $this->payment = $payment;
    }

    public function getShipping():string {
        return $this->shipping;
    }
    public function setShipping($shipping){
        $this->shipping = $shipping;
    }

    public function getUserId():int {
        return $this->userId;
    }
    public function settUserId($userId){
        $this->userId = $userId;
    }

    public function getNOrder(): string
    {
        return $this->nOrder;
    }

    public function setNOrder(string $nOrder)
    {
        $this->nOrder = $nOrder;
    }

    public function getProductsId(): array
    {
        return $this->productsId;
    }

    public function setProductsId(array $productsId)
    {
        $this->productsId = $productsId;

    }

    public function getCreatedAt():DateTimeImmutable{
       
        return $this->createdAt;
    }

    public function getFormattedCreatedAt(): string 
    {
        $createdAt = new DateTimeImmutable();

        return $createdAt->format('d/m/Y');
    }
}