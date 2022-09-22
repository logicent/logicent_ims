<?php

namespace crudle\ext\accounts\enums;

use Yii;

class Type_Sale extends Type_Transaction
{
    // Sales Receipt - Cash/Credit Sale
    // Sales Return - Credit Note
    public static function enumsHeaderLabel()
    {
        return [
            // self::Advance => Yii::t('app', 'Advance'),
            self::Cash => Yii::t('app', 'Cash Sale'),
            self::Credit => Yii::t('app', 'Credit Sale'),
            self::Return => Yii::t('app', 'Return Sale'),
        ];
    }
}