<?php

namespace app\enums;

class Type_Order
{
    const Sales  = 'Sales';
    const Maintenance  = 'Maintenance';
    const ShoppingCart  = 'Cart';

    public static function enums()
    {
        return [
            self::Sales => self::Sales,
            // self::Maintenance => self::Maintenance,
            // self::ShoppingCart => self::ShoppingCart,
        ];
    }
}