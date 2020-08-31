<?php
namespace Domain;

abstract class PaymentType
{
    const CASH_TO_COURIER = 0; // Наличными курьеру
    const PAYMENT_BY_CARD = 1; // Оплата картой
}