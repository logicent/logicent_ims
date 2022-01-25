<?php

namespace app\enums;

class Status_Person
{
    const Active   = 'Active';
    const Inactive = 'Inactive';

    const ActiveColor   = 'green';
    const InactiveColor = 'red';

    public static function enums()
    {
        return [
            self::Active    => self::Active,
            self::Inactive  => self::Inactive,
        ];
    }

    public static function enumsColor()
    {
        return [
            self::Active    => self::ActiveColor,
            self::Inactive  => self::InactiveColor,
        ];
    }
}