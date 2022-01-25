<?php

namespace app\enums;

class Status_Party
{
    const Active    = 'Active';
    const Inactive  = 'Inactive';

    const ActiveColor   = 'green';
    const InactiveColor = 'red';

    public static function enums()
    {
        return [
            0   => self::Active,
            1   => self::Inactive,
        ];
    }

    public static function enumsColor()
    {
        return [
            0   => self::ActiveColor,
            1   => self::InactiveColor,
        ];
    }    
}