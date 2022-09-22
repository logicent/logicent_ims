<?php

namespace crudle\ext\accounts\enums;

use Yii;

class Type_Purchase extends Type_Transaction
{
    public static function enumsHeaderLabel()
    {
        return [
            // self::Advance => Yii::t('app', 'Advance'),
            self::Cash => Yii::t('app', 'Cash Purchase'),
            self::Credit => Yii::t('app', 'Credit Purchase'),
            self::Return => Yii::t('app', 'Return Purchase'),
        ];
    }
}