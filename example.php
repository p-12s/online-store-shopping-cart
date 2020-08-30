<?php

abstract class Product{
    public $title;
    public $price;


    public function __construct($title, $price){
        $this->title = $title;
        $this->price = $price;
    }
}

class Cart{
    public $countProduct = [];

    public function addProduct($product){
        $product->numberProduct = 1; //если это убрать то тоже буде работать, только не будет учитывать первый

        if(array_key_exists($product->title, $this->countProduct)){
            $this->countProduct[$product->title]->numberProduct++;

            echo 'Товар добавлен в корзину<br>';
        }
        else{
            $this->countProduct[$product->title] = $product;
        }
    }

    public function deleteAllProduct($product){ //убрать все одинаковые продукты из корщины
        echo $product->title . ' удалён';
        unset($this->countProduct[$product->title]);
    }

    public function deleteOneProduct($product){ //убрать 1 одинаковый продукт
        if(array_key_exists($product->title, $this->countProduct)){

            if($this->countProduct[$product->title]->numberProduct > 0){

                $this->countProduct[$product->title]->numberProduct--;
                echo 'Товар ' . $this->countProduct[$product->title]->title. ' удалён из корзины<br>';
            }
        }
    }

    public function showAllProduct(){ //показать список продуктов и количество
        $resCountProduct = 0;

        foreach($this->countProduct as $key => $value){
            echo 'Товар ' . $key . ', количество: ' . $value->numberProduct . '<br>';

            $resCountProduct = $resCountProduct + $value->numberProduct;


        }

        echo 'Общее количество товаров: ' . $resCountProduct;


        /*
        echo '<pre>';
        var_dump($this->countProduct);
        */
    }

    public function sum(){ //подсчитать общую сумму продукта

        $res = 0;
        //var_dump($this->countProduct);

        foreach($this->countProduct as $key => $value){
            $res = $res + ($value->price * $value->numberProduct);
        }

        return $res;

    }
}

class Planshet extends Product{}

$asus = new Planshet('Asus', 2000);
$asus2 = new Planshet('Asus', 2000);
$asus3 = new Planshet('Asus', 2000);
$asus4 = new Planshet('Asus', 2000);

$lenovo = new Planshet('Lenovo', 3000);
$lenovo3 = new Planshet('Lenovo', 3000);

$korzina = new Cart();

$korzina->addProduct($asus); //добавляю товар в корзину
$korzina->addProduct($asus2); //добавляю товар в корзину
$korzina->addProduct($asus3); //добавляю товар в корзину
$korzina->addProduct($asus4); //добавляю товар в корзину

$korzina->addProduct($lenovo); //добавляю товар в корзину
$korzina->addProduct($lenovo3); //добавляю товар в корзину


//$korzina->deleteOneProduct($asus);


echo '<br>';

$korzina->showAllProduct();

echo '<br>';
echo '<br>';
echo 'На сумму: ' . $korzina->sum();