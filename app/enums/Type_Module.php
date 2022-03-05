<?php

namespace app\enums;

class Type_Module
{
    const Accounting        = 'Accounting';
    const Buying            = 'Buying';
    const Stock             = 'Stock';
    const Selling           = 'Selling';
    const System            = 'System';
    const HR                = 'HR';
    const Bakery            = 'Bakery';
    const Production        = 'Production';
    const Fleet             = 'Fleet';
    const Customize         = 'Customize';
    const POS               = 'POS';
    const Website           = 'Website';

    public static function enums()
    {
        return [
            self::Accounting        => self::Accounting,
            self::Buying            => self::Buying,
            self::Stock             => self::Stock,
            self::Selling           => self::Selling,
            self::System            => self::System,
            self::HR                => self::HR,
            self::Bakery            => self::Bakery,
            self::Production        => self::Production,
            self::Customize         => self::Customize,
            self::Website           => self::Website,
        ];
    }
}