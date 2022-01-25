<?php

namespace app\enums;

class Type_Module
{
    const Accounting        = 'Accounting';
    const Buying            = 'Buying';
    const Stock             = 'Stock';
    const Selling           = 'Selling';
    const System            = 'System';

    public static function enums()
    {
        return [
            self::Accounting        => self::Accounting,
            self::Buying            => self::Buying,
            self::Stock             => self::Stock,
            self::Selling           => self::Selling,
            self::System            => self::System,
        ];
    }
}