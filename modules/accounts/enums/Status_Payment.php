<?php

namespace crudle\ext\accounts\enums;

class Status_Payment
{
    const Paid      = 'Paid';
    const Partial   = 'Partial';
    const Unpaid    = 'Unpaid';

    const PaidColor     = 'green';
    const PartialColor  = 'yellow';
    const UnpaidColor   = 'red';

    const PaidLabel     = 'Paid';
    const PartialLabel  = 'Partial';
    const UnpaidLabel   = 'Not paid';

    public static function enums()
    {
        return [
            self::Paid      =>  self::PaidLabel,
            self::Partial   =>  self::PartialLabel,
            self::Unpaid    =>  self::UnpaidLabel,
        ];
    }

    public static function enumsColor()
    {
        return [
            self::Paid  =>  self::PaidColor,
            self::Partial  =>  self::PartialColor,
            self::Unpaid   =>  self::UnpaidColor,
        ];
    }

    public static function enumsLabel()
    {
        return [
            self::Paid  =>  self::PaidLabel,
            self::Partial  =>  self::PartialLabel,
            self::Unpaid   =>  self::UnpaidLabel,
        ];
    }
}