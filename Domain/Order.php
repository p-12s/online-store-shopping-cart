<?php

namespace Domain;
use Domain\Cart;
use Domain\CustomerLegalType;
use Domain\PaymentForm;

class Order
{
    // Данные покупателя
    private $customerLegalType;
    private $firstName;
    private $surnameName;
    private $email;
    private $phone;
    private $comment;
    // Дата и время доставки
    private $day;
    private $time;
    private $address;
    private $street;
    private $house;
    private $apartment;
    private $floor;
    private $doesElevatorWork;
    // Способ оплаты
    private $paymentForm;

    // инициируем данные
    // повторить (те же продукты)
    // оплатить

    public function isValid() {
        // валидация обязательных полей
    }
}