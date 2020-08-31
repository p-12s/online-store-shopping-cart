<?php
namespace Domain;

class Product
{
    private $id;
    private $name;
    private $price;
    private $crossedPrice;
    private $amountInPackage;
    private $imgPath;

    function __construct(int $id, string $name, float $price, float $crossedPrice, int $amountInPackage, string $imgPath) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->crossedPrice = $crossedPrice;
        $this->amountInPackage = $amountInPackage;
        $this->imgPath = $imgPath;
        if ($price <= 0 || $crossedPrice <= 0 || $amountInPackage <= 0) {
            throw new \Exception('Значение параметров price, crossedPrice, amountInPackage д.б. > 0');
        }
    }

    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getCrossedPrice() {
        return $this->crossedPrice;
    }
    public function getAmountInPackage() {
        return $this->amountInPackage;
    }
    public function getImgPath() {
        return $this->imgPath;
    }
    /** Стоимость упаковки товара. Бутыль 18.9л считаем, что 1 шт в упаковке
    */
    public function getPackagePrice() {
        return $this->price * $this->amountInPackage;
    }
}
