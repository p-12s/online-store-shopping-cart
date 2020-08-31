<?php
namespace Domain;
use Domain\Product;

class Cart
{
    private $productsInCart;
    private $discountCode; // применять купон к корзине или к заказу?

    public function addProduct(Product $product, $amount){
        if (array_key_exists($product->getId(), $this->productsInCart)) {
            $this->productsInCart[$product->getId()]->addQuantity($amount);
        }
        $this->productsInCart[$product->getId()] = new ProductInCart($product, $amount);
    }

    public function removeProduct(int $productId, int $quantity){
        if (!array_key_exists($productId, $this->productsInCart)) {
            throw new \Exception('Нельзя удалить из корзины несуществующий товар');
        }
        $currentQuantity = $this->productsInCart[$productId]->getQuantity();
        if ($currentQuantity === $quantity) { // удаляем 10 из 10 - значит удалим весь товар
            unset($this->productsInCart[$productId]);
        }
        $this->productsInCart[$productId]->reduceQuantity($quantity);
    }

    public function removeProductById(int $productId){
        if (!array_key_exists($productId, $this->productsInCart)) {
            throw new \Exception('Нельзя удалить из корзины несуществующий товар');
        }
        unset($this->productsInCart[$productId]);
    }

    public function removeAll(){
        unset($this->productsInCart);
        $this->productsInCart = [];
    }
    /** Общая стоимость товаров в корзине
     */
    public function calculateTotalSum(){
        $totalSum = 0;
        foreach ($this->productsInCart as $productInCart) {
            $totalSum += $productInCart->getProductInCartPrice();
        }
        return $totalSum;
    }
    public function applyDiscount() {
        throw new \Exception('Метод не реализован!');
    }
}