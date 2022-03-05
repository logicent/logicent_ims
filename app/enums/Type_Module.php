<?php

namespace app\enums;

class Type_Module
{
    const System            = 'System';
    const Customize         = 'Customize';
    const Website           = 'Website';
    const Accounting        = 'Accounting';
    const Buying            = 'Buying';
    const Stock             = 'Stock';
    const Selling           = 'Selling';
    const HR                = 'HR';
    const Bakery            = 'Bakery';
    const Production        = 'Production';
    const Fleet             = 'Fleet';
    const POS               = 'POS';

    public static function enums()
    {
        return [
            self::System           => self::System,
            self::Customize        => self::Customize,
            self::Website          => self::Website,
            self::Accounting       => self::Accounting,
            self::Buying           => self::Buying,
            self::Stock            => self::Stock,
            self::Selling          => self::Selling,
            self::HR               => self::HR,
            self::Bakery           => self::Bakery,
            self::Production       => self::Production,
            self::Fleet        	=> self::Fleet,
            self::POS        	=> self::POS,
        ];
    }
}
