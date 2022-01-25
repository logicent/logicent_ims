<?php

namespace app\enums;

class Type_Order
{
    const Regular  = 'Regular';
    const Maintenance  = 'Maintenance';
    const ShoppingCart  = 'Cart';

    public static function enums()
    {
        return [
            self::Regular => self::Regular,
            // self::Maintenance => self::Maintenance,
            // self::ShoppingCart => self::ShoppingCart,
        ];
    }
}