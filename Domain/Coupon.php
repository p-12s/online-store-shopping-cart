<?php
namespace Domain;

class Coupon
{
    private $code;// TODO как-то проверять валидность и применять ко всей корзине

}
/* у меня купон применяется к заказу. и только?
4. Класс Абстрактный "Купон"
Свойства:
    Процент скидки
    Сумма скидки
Методы:
    Применить
    Фабрика - в зависимости от типа на входе создает экземпляр нужного потомка для Товара или Корзины

5. Класс "Купон для товара" наследник от класса "Купон"
Свойства:
    Товар
Методы:
    Применить

6. Класс "Купон для корзины" наследник от класса "Купон"
Свойства:
    Корзина
Методы:
    Применить
*/