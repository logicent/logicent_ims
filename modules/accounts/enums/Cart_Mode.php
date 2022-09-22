<?php

namespace crudle\ext\accounts\enums;

class Cart_Mode
{
    const Sales    = 'Sales';
    const Purchase    = 'Purchase';

    public static function enums()
    {
        return [
            self::Sales => self::Sales,
            self::Purchase => self::Purchase,
        ];
    }
}
