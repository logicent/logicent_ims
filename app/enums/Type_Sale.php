<?php

namespace app\enums;

use Yii;

class Type_Sale
{
    // const Advance  = 'Advance';      // Pre-payment
    const CashSale  = 'Cash';       // Prompt payment vs. Cash-on-Demand (CoD)?
    const CreditSale  = 'Credit';       // Post-paid
    const ReturnSale  = 'Return';       // Reverse payment

    public static function enums()
    {
        return [
            // self::Advance => self::Advance,
            self::CashSale => self::CashSale,
            self::CreditSale => self::CreditSale,
            self::ReturnSale => self::ReturnSale,
        ];
    }

    public static function enumsHeaderLabel()
    {
        return [
            // self::Advance => Yii::t('app', 'Advance'),
            self::CashSale => Yii::t('app', 'Cash Sale'),
            self::CreditSale => Yii::t('app', 'Credit Sale'),
            self::ReturnSale => Yii::t('app', 'Return Sale'),
        ];
    }

    public static function enumsButtonLabel()
    {
        return [
            // self::Advance => Yii::t('app', 'Pay&ensp;Early'),
            self::CashSale => Yii::t('app', 'Pay Now'),
            self::CreditSale => Yii::t('app', 'Pay Later'),
            self::ReturnSale => Yii::t('app', 'Pay Back'),
        ];
    }

    public static function enumsColor()
    {
        return [
            // self::Advance => Yii::t('app', 'Pay&ensp;Early'),
            self::CashSale => 'orange',
            self::CreditSale => 'blue',
            self::ReturnSale => 'red',
        ];
    }
}