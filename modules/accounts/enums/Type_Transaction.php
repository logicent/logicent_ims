<?php

namespace crudle\ext\accounts\enums;

use Yii;

class Type_Transaction
{
    // const Advance  = 'Advance';      // Pre-payment
    const Cash  = 'Cash';       // Prompt payment vs. Cash-on-Demand (CoD)?
    const Credit  = 'Credit';       // Post-paid
    const Return  = 'Return';       // Reverse payment

    public static function enums()
    {
        return [
            // self::Advance => self::Advance,
            self::Cash => self::Cash,
            self::Credit => self::Credit,
            self::Return => self::Return,
        ];
    }

    public static function enumsButtonLabel()
    {
        return [
            // self::Advance => Yii::t('app', 'Pay&ensp;Early'),
            self::Cash => Yii::t('app', 'Pay Now'),
            self::Credit => Yii::t('app', 'Pay Later'),
            self::Return => Yii::t('app', 'Pay Back'), // Take Back if no payment included?
        ];
    }

    public static function enumsColor()
    {
        return [
            // self::Advance => 'yellow',
            self::Cash => 'orange',
            self::Credit => 'blue',
            self::Return => 'red',
        ];
    }
}