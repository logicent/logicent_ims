<?php

namespace app\enums;

class Cart_Mode
{
    const Sales    = 'Sales';
    const Purchases    = 'Purchases';

    public static function enums()
    {
        return [
            self::Sales => self::Sales,
            self::Purchases => self::Purchases,
        ];
    }
}
