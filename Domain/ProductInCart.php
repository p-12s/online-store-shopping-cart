<?php
namespace Domain;

use Domain\Product;

class ProductInCart
{
    private $productId;
    private $product;
    private $quantity;
    private $linkToPage;
    // тут как-то показать акционность товара?

    function __construct(Product $product, int $quantity) {
        $this->product = $product;
        if ($quantity <= 0) {
            throw new \Exception('Кол-во товара в корзине д.б. > 0');
        }
        $this->quantity = $quantity;
    }

    function __destruct() {
    }

    public function addQuantity(int $countDiff){
        if ($countDiff <= 0) {
            throw new \Exception('Кол-во товара для добавления д.б. > 0');
        }
        $this->quantity += $countDiff;
    }

    public function reduceQuantity(int $countDiff){
        if ($countDiff <= 0 ) {
            throw new \Exception('Кол-во товара для уменьшения д.б. > 0');
        }
        if ($this->quantity - $countDiff < 0 ) {
            throw new \Exception('Вы попытались удалить из корзины товаров больше, чем там есть');
        }
        $this->quantity -= $countDiff;
    }

    public function getQuantity(){
        return $this->quantity;
    }
    /** Общая стоимость товара этого типа в корзине. Суммируем кол-во стандартных упаковок товара
     */
    public function getProductInCartPrice() {
        return $this->quantity * $this->product->getPackagePrice();
    }
}