<?php
namespace Domain;

class OrderStatusType
{
    const PAYMENT_AWAIT = 0; // Ожидает оплаты
    const PAID = 1; // Оплачен
    const CREATED = 2; // На этапе создания
}