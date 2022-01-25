<?php

namespace app\enums;

class Status_Payment
{
    const Paid      = 'Paid';
    const Unpaid    = 'Unpaid';

    const PaidColor     = 'green';
    const UnpaidColor   = 'red';

    const PaidLabel     = 'Paid';
    const UnpaidLabel   = 'Not paid';

    public static function enums()
    {
        return [
            self::Paid =>  self::PaidLabel,
            self::Unpaid =>  self::UnpaidLabel,
        ];
    }

    public static function enumsColor()
    {
        return [
            self::Paid  =>  self::PaidColor,
            self::Unpaid   =>  self::UnpaidColor,
        ];
    }

    public static function enumsLabel()
    {
        return [
            self::Paid  =>  self::PaidLabel,
            self::Unpaid   =>  self::UnpaidLabel,
        ];
    }
}