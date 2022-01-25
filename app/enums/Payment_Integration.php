<?php

namespace app\enums;

use Yii;

class Payment_Integration
{
    const Mpesa     = 'Mpesa';
    // const AirtelMoney   = 'Airtel Money';
    // const EquitelMoney  = 'Equitel Money';
    // Paypal, Pesapal
    // Debit/Credit (Bank) cards (PDQ) - Master Card and VISA

    public static function enums()
    {
        return [
            self::Mpesa        => self::Mpesa,
        ];
    }
}
