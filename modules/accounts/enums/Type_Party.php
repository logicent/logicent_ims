<?php

namespace crudle\ext\accounts\enums;

use Yii;

class Type_Party
{
    const Customer  = 'C';
    const Supplier  = 'S';
    const Person  = 'P';

    public static function enums()
    {
        return [
            self::Customer => Yii::t('app', 'Customer'),
            self::Supplier => Yii::t('app', 'Supplier'),
            self::Person => Yii::t('app', 'Person'),
        ];
    }
}